/* global L, mapbox */

class LeafletFunctions {
  constructor() {
    // Create a new map element
    this.map = L.map('map', {
      center: [37.8, -96], // Sets the center point based off of lat lon
      zoom: window.screen.width < 700 ? 4 : 5, // Sets the zoom level of the map based on if the screen is mobile
      attributionControl: false, // Remove the bottom right attribution tags
      zoomControl: false, // Remove the zoom control to be added elsewhere
      fadeAnimation: true, // Enable the fade animation 
      zoomAnimation: true, // Enable the zoom animation
      doubleClickZoom: false, // Disable the double click zoom mainly for mobile
    });

    // Set the max bounds of the map
    const southWest = L.latLng(0, -200); // Set the bottom left 
    const northEast = L.latLng(60, 0); // Set the top right
    const bounds = L.latLngBounds(southWest, northEast);
    this.map.setMaxBounds(bounds);

    // Enable gesture handling
    this.map.gestureHandling.enable();

    // Create a layergroup to hold markers
    this.layerGroup = new L.LayerGroup().addTo(this.map);

    // Set the zoom control to the bottom right of the map
    this.zoomControl = new L.Control.Zoom({
      position: 'bottomright',
    }).addTo(this.map);

    this.tileLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      maxZoom: 18,
      id: 'tcarpenterkpg/ckquys6760fga17qs4z72e2mp',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: mapbox.token,
    }).addTo(this.map);

    // Create a watermark for the map
    L.Control.Watermark = L.Control.extend({
      onAdd: () => {
        const img = L.DomUtil.create('img');
        img.src = 'https://kittleproperties.com/wp-content/uploads/2021/05/KittleMonogram_RGB.png';
        img.style.width = '50px';
        return img;
      },
    });
    L.control.Watermark = (opts) => new L.Control.Watermark(opts);

    // Position of the water mark on the top right
    L.control.Watermark({
      position: 'topright',
    }).addTo(this.map);

    // Create the filter menu button
    L.easyButton('<div class="js-open-filter-menu filterMenuGroup" ><img class="js-filter_image filter-image" id="filterMenuButton" src="https://kittleproperties.com/wp-content/uploads/2021/08/funnel_alt.png"><h2 class="js-filter_title">FILTER</h2></div>', () => {}).addTo(this.map);

    // Hidden Layer
    this.hiddenLayer = false;
  }

  /**
   * The AddGeoJsonLayer is a function that adds a state boundary to the map
   * @param {Object} StateDataGeometry Geometry data for a specific state
   */
  addGeoJsonLayer(StateDataGeometry) {
    L.geoJson(StateDataGeometry, {
      onEachFeature: this.mapEventHandler.bind(this),
      style: this.polyStyle.bind(this),
    }).addTo(this.layerGroup);
  }

  changeStyle(style) {
    this.tileLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      maxZoom: 18,
      id: 'tcarpenterkpg/ckst939nu0j9h17nzhrr70ter',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: mapbox.token,
    }).addTo(this.map);

    this.layerGroup.eachLayer((layer) => {

      let layerID = Object.keys(layer._layers);
      let currentColor = layer._layers[layerID].options.fillColor;

      if (currentColor === '#3f85c6') {
        layer.setStyle({
          fillColor: '#004b2a'
        })
      }
      if (currentColor === '#6897d0') {
        layer.setStyle({
          fillColor: '#0e5731'
        })
      }
      if (currentColor === '#82a6d8') {
        layer.setStyle({
          fillColor: '#1c6338'
        })
      }
      if (currentColor === '#9cb7e0') {
        layer.setStyle({
          fillColor: '#28703e'
        })
      }
      if (currentColor === '#b8cae8') {
        layer.setStyle({
          fillColor: '#347c45'
        })
      }
      if (currentColor === '#d4def1') {
        layer.setStyle({
          fillColor: '#41894b'
        })
      }
    });

    this.hiddenLayer = true;

  }

  /**
   * Function that returns a marker cluster object
   * @returns  {Object}
   */
  static markerCluster() {
    return new L.markerClusterGroup({
      spiderfyOnMaxZoom: true,
      showCoverageOnHover: false,
      zoomToBoundsOnClick: true,
    });
  }

  /**
   * Function that returns the maps current zoom level
   * @returns {Integer}
   */
  getZoomLevel() {
    return this.map.getZoom();
  }

  /**
   * Function to move the map when the filter menu is opened
   */
  setFilterView() {
    this.map.setView([37.8, -101], window.screen.width < 700 ? 4 : 5, {
      'animate': true,
      'pan': {
        'duration': 0.5,
      },
    });
  }

  /**
   * Function that moves the map to the orignial view of the map prior to opening the filter menu
   * @returns {any}
   */
  closeFilterView() {
    this.map.setView([37.8, -96], window.screen.width < 700 ? 4 : 5, {
      'animate': true,
      'pan': {
        'duration': 0.5,
      },
    });
  }

  /**
   * Function to add a markerCluster to the layer to be displayed on the map
   * @param {Object} markerCluster
   */
  addMarkerCluster(markerCluster) {
    this.layerGroup.addLayer(markerCluster);
  }

  /**
   * Function to clear all markers from the map
   */
  clearMarkers() {
    this.layerGroup.clearLayers();
  }

  /**
   * PolyStyle returns the base style for the state depending on the number
   * of buildings in that state
   * @param {Object} feature Contains the state data and the number of buildings in that given state
   * @return  {Object}
   */
  polyStyle(feature) {
    // TODO Make some of these settings available to change in the settings screen
    return {
      fillColor: this.getStateBuildingDensityColor(feature.properties.BUILDINGS),
      weight: 2,
      opacity: 1,
      color: '#fff',
      dashArray: '1',
      fillOpacity: 1,
    };
  }

  /**
   * Function that returns a darker shade based on the number of buildings in that state
   * @param {Integer} buildings Number of buildings that a given state has
   * @returns {String}
   */
  getStateBuildingDensityColor(buildings) {
    // TODO Make these colors available to change in the settings screen
    // TODO Make the cutoffs available to change in the settings screen
    if (buildings >= 15) {
      if (this.hiddenLayer) {
        return '#004b2a';
      }
      return '#3f85c6';
    }
    if (buildings >= 12) {
      if (this.hiddenLayer) {
        return '#0e5731';
      }
      return '#6897d0';
    }
    if (buildings >= 9) {
      if (this.hiddenLayer) {
        return '#1c6338'
      }
      return '#82a6d8';
    }
    if (buildings >= 5) {
      if (this.hiddenLayer) {
        return '#28703e';
      }
      return '#9cb7e0';
    }
    if (buildings >= 3) {
      if (this.hiddenLayer) {
        return '#347c45'
      }
      return '#b8cae8';
    }

    // Default Color
    if (this.hiddenLayer) {
      return '#41894b'
    }
    return '#d4def1';
  }

  /**
   * Function that handles the mouseover style
   */
  static featureHover(e) {
    // TODO Make these settings available to change in the settings screen
    e.target.setStyle({
      weight: 2,
      color: '#efefef',
      dashArray: '',
    });

    // Checks the browser type
    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
      e.target.bringToFront();
    }
  }

  /**
   * Function that handles the mouseout style
   */
  featureUnhover(e) {
    e.target.setStyle(this.polyStyle(e.target.feature));
  }

  /**
   * Function that handles the click functionality
   */
  zoomToFeature(e) {
    // Sets the value of the state to the state query input
    $('.js-state-input').val(e.target.feature.properties.abbrevition);

    // Fits the bounds of the poly within the maps screen
    this.map.fitBounds(e.target.getBounds());
  }

  /**
   * Function that zooms the map back out to its original state depending on screen size
   */
  resetZoomFromFeature() {
    let zoomLevel = 5; // Default non-mobile screen zoom

    if (L.Browser.Mobile) {
      zoomLevel = 4;
    }

    this.map.setView([37.8, -96], zoomLevel, {
      'animate': true,
      'pan': {
        'duration': 0.5,
      },
    });
  }

  /**
   * Function that handles events and calls the respective functions to handle those calls.
   *  This function handles: Mouseover, Mouseout, Click, DoubleClick, and RightClick
   * @param {Object} feature Contains the state data and the number of buildings in that given state
   * @param {Object} layer Contains the information about the layer that the feature is located on
   */
  mapEventHandler(feature, layer) {
    layer._leaflet_id = feature.properties.STATE_NAME;

    layer.on({
      mouseover: LeafletFunctions.featureHover.bind(this),
      mouseout: this.featureUnhover.bind(this),
      click: this.zoomToFeature.bind(this),
      contextmenu: this.resetZoomFromFeature.bind(this), // Right Click
      dblclick: this.resetZoomFromFeature.bind(this),
    });
  }
}