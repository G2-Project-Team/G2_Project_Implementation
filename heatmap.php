<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Heatmap</title>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <link rel="stylesheet" href="styles3.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://unpkg.com/papaparse@5.4.1/papaparse.min.js"></script>
  <script src="https://unpkg.com/chroma-js@2.4.2/chroma.min.js"></script>
</head>
<body>
  <header>
    <h1>Heatmap — Grid Luminosity</h1>
  </header>

  <div class="map-card">
    <div id="map" role="application" aria-label="Heatmap"></div>
  </div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  // gets the csv dataset
  const csvUrl = 'grid_coords_with_weather.csv';

  // create the map inside the #map element
  const map = L.map('map', { zoomControl: false, attributionControl: false, preferCanvas: true }).setView([55.79, -4.55], 12);

  // add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '© OpenStreetMap contributors'}).addTo(map);

  // turn CSV rows into GeoJSON polygons
  function buildGeoJSON(groups) {
    const features = [];
    for (const gridId in groups) {
      const rows = groups[gridId].sort((a, b) => Number(a.point_order) - Number(b.point_order));
      const coords = rows.map(r => [Number(r.lon), Number(r.lat)]);

      // close the polygon if needed
      if (!(coords[0][0] === coords[coords.length - 1][0] && coords[0][1] === coords[coords.length - 1][1])) {
        coords.push(coords[0]);
      }

      // average the values for the cell
      const lum = rows.reduce((s, r) => s + Number(r.average_luminosity), 0) / rows.length

      features.push({type: 'Feature', properties: { grid_id: gridId, average_luminosity: lum }, geometry: { type: 'Polygon', coordinates: [coords] }});
    }
    return { type: 'FeatureCollection', features };
  }

  // draw the grid, style it, and lock view to the grid area
  function renderChoropleth(geojson) {
    const vals = geojson.features.map(f => f.properties.average_luminosity);
    const min = Math.min(...vals), max = Math.max(...vals);
    const scale = chroma.scale(['#440154','#3b528b','#21918c','#5ec962','#fde725']).domain([min, max]);

    if (!map.getPane('gridPane')) {
      map.createPane('gridPane');
      map.getPane('gridPane').style.zIndex = 400;
    }

    // create the geojson layer and keep a reference named 'geojsonLayer'
    const geojsonLayer = L.geoJSON(geojson, {
      pane: 'gridPane',
      style: feature => {
        const v = feature.properties.average_luminosity;
        return {fillColor: scale(v).hex(), weight: 0.8, color: '#000', opacity: 0.35, fillOpacity: 0.5};
      },

      // creates popup on click, and grid outline on mouseover
      onEachFeature: (feature, layer) => {
        const p = feature.properties;
        layer.bindPopup(`<b>Grid</b>: ${p.grid_id}<br><b>Luminosity</b>: ${p.average_luminosity}`);
        layer.on({mouseover(e) { e.target.setStyle({ weight: 1.8, color: '#111' }); }, mouseout(e) { geojsonLayer.resetStyle(e.target); }});
      }
    }).addTo(map);

    // Fit to bounds and lock view
    const bounds = geojsonLayer.getBounds();
    map.fitBounds(bounds, { padding: [10, 10] });
    map.setMaxBounds(bounds.pad(0));
    const currentZoom = map.getZoom();
    map.setMinZoom(currentZoom);
    map.setMaxZoom(currentZoom);
    map.dragging.disable();
    map.touchZoom.disable();
    map.doubleClickZoom.disable();
    map.scrollWheelZoom.disable();
    map.boxZoom.disable();
    map.keyboard.disable();
    map.off();
  }

  // load the CSV, group rows by grid_id, then render
  Papa.parse(csvUrl, {
    download: true,
    header: true,
    complete: results => {
      const data = results.data.filter(r => r && r.grid_id);
      const groups = {};
      data.forEach(row => { const id = String(row.grid_id); (groups[id] ??= []).push(row); });
      const geojson = buildGeoJSON(groups);
      renderChoropleth(geojson);
    },
    error: err => { console.error('CSV load error', err); alert('Failed to load CSV: ' + err.message); }
  });
});
</script>
</body>
</html>
