/* global LeafletFunctions, L, viewVariables */

class View {
  constructor() {
    this.LeafletFunctions = new LeafletFunctions();

    this.listingArea = $('#listingArea');
    this.dropdownButton = $('.dropdown-button');
    this.dropdownContent = $('.dropdown-content');
    this.searchBar = $('.js-search-input');
  }

  /**
   * The DisplayStatePoly function takes a StateData Geometry Object and draws the boundary
   * of the state
   * @param {Object} stateDataGeometry Geometry data containing points to draw the state border
   */
  displayStatePoly(stateDataGeometry) {
    this.LeafletFunctions.addGeoJsonLayer(stateDataGeometry);
  }

  /**
   * Description
   * @returns {any}
   */
  createMarkerCluster() {
    return LeafletFunctions.markerCluster();
  }

  /**
   * Function that creates the individual property marker and popup
   * @param   {Array}    propertyData       Data of the property
   * @return  {Object}                        L.marker Object
   */
  createPropertyMarker(propertyData) {
    const marker = L.marker([propertyData.LAT, propertyData.LON]);

    View.bindPropertyMarkerPopup(marker, propertyData);

    return marker;
  }

  /**
   * Description
   * @param {any} stateMarkerCluster
   * @param {any} propertyMarker
   * @returns {any}
   */
  static addPropertyMarkerToStateCluster(stateMarkerCluster, propertyMarker) {
    stateMarkerCluster.addLayer(propertyMarker);
  }

  /**
   * Description
   * @param {any} stateMarkerCluster
   * @returns {any}
   */
  addStateMarkerClusterToMap(stateMarkerCluster) {
    this.LeafletFunctions.addMarkerCluster(stateMarkerCluster);
  }

  /**
   * Function that creates the marker popup and binds it to the marker on click
   * @param {Object} marker
   * @param {Object} propertyData
   */
  static bindPropertyMarkerPopup(marker, propertyData) {
    const popupHTML = `
        <div class="popup_listing">
            <h2 class="popup_listing_name">${propertyData.NAME}</h2>
            <h3 class="popup_listing_housingtype"><strong>${propertyData.HOUSINGTYPES} Housing</strong></h3>
            <h4 class="popup_listing_address">${propertyData.ADDRESS}, ${propertyData.CITY}, ${propertyData.STATE}</h4>
            <a class="popup_listing_website" href="${propertyData.WEBSITE}">WEBSITE</a>
        </div>`;

    marker.bindPopup(popupHTML);
  }

  /**
   * Function to retreive the tag names defined in the setting based on the tag id
   * @param {String} tagID ID of the tag used to retreive the tag name
   * @returns {String}
   */
  static setTagName(tagID) {
    // TODO Make the tag names editable in settings

    switch (tagID) {
      case 'TAG_1':
        return viewVariables.tagName1;
      case 'TAG_2':
        return viewVariables.tagName2;
      case 'TAG_3':
        return viewVariables.tagName3;
      case 'TAG_4':
        return viewVariables.tagName4;
      case 'TAG_5':
        return viewVariables.tagName5;
      case 'TAG_6':
        return viewVariables.tagName6;
      case 'TAG_7':
        return viewVariables.tagName7;
      case 'TAG_8':
        return viewVariables.tagName8;
      case 'TAG_9':
        return viewVariables.tagName9;
      case 'TAG_10':
        return viewVariables.tagName10;
      default:
        return 'DEFAULT TAG';
    }
  }

  /**
   * Function to return an array containing all of the active tags for a given property
   * @param {Object} propertyDataTags Contains the data for all possible tags for a given property
   * @returns {Array}
   */
  static getTags(propertyDataTags) {
    return Object.keys(propertyDataTags).filter((key) => propertyDataTags[key] === 'TRUE');
  }

  /**
   * Function that adds the listing to the search result
   * @param {Object} propertyData Data of the property
   */
  displayListings(propertyData) {
    const listingLiteral = `
            <div class = "LISTING" id = "property_${propertyData.ID}">
                <div class="LISTING-INFO-AREA">
                    <div class="LISTING-INFO">
                        <h4 class="property_name">${propertyData.NAME}</h4>
                        <h6 class="property_address">${propertyData.ADDRESS}, ${propertyData.CITY}, ${propertyData.STATE}</h6>
                    </div>
                    <div class="TAG">
                        ${View.getTags(propertyData.TAGS).map((tag) => `<p class="${tag}">${View.setTagName(tag)}</p>`).join('\n\t\t\t\t\t\t')}
                    </div>
                    <div class="LISTING-LINK">
                        <a class="LISTING-WEBSITE" href=${propertyData.WEBSITE}>WEBSITE</a>
                    </div>
                </div>
                <div class="PROPERTY-IMAGE-AREA">
                    <img class="property_image" src="${propertyData.IMAGE}" alt="apartment_image">
                </div>
            </div>`;

    this.listingArea.append(listingLiteral);
  }

  /**
   * Function to clear all listings from the listing area
   */
  clearListings() {
    try {
      this.listingArea.empty();
      return true;
    } catch (error) {
      console.error(error);
      return false;
    }
  }

  /**
   * Function to clear all markers from the map
   */
  clearMarkers() {
    this.LeafletFunctions.clearMarkers();
  }

  /**
   * Function to clear everything from the map
   */
  clearAll() {
    this.clearListings();
    this.clearMarkers();
  }

  clearSearch() {
    this.searchBar.val('');
  }

  /**
   * AddStateToMap function adds a single state and its properties to the map and listing area
   * @param {Object} stateData
   */
  addStateToMap(stateData) {
    // Display the state on the map
    this.displayStatePoly(stateData.getGeometry());

    // Display the Listings
    this.displayListings(stateData.getPropertyList());
  }

  /**
   * Function to open the filter menu based on the screen width
   */
  openFilterMenu(e) {

    this.LeafletFunctions.setFilterView();

    $('.js-filter-menu').animate({
      width: window.screen.width < 700 ? '100%' : '33%',
    }, 500);

    $('.js-filter-menu_header, .js-filter-menu_body').fadeIn();

    $('.filterMenuGroup').fadeOut();

  }

  /**
   * Function to close the filer menu and reset the view
   */
  closeFilterMenu(e) {
    this.LeafletFunctions.closeFilterView();

    $('.js-filter-menu').animate({
      width: '0%',
    }, 500);

    $('.js-filter-menu_header, .js-filter-menu_body').fadeOut();

    $('.filterMenuGroup').fadeIn();
  }

  /**
   * Function to open and close the dropdown state select
   */
  toggleDropdown(e) {
    this.dropdownContent.toggleClass('show');
    if (this.dropdownContent.height() > 0) {
      this.dropdownContent.animate({
        height: '0px',
      });
    } else {
      this.dropdownContent.animate({
        height: '50vh',
      });
    }

  }

  /**
   * Function to add the selected dropdown item to the filter and close the dropdown
   */
  dropdownContentSelect(e) {
    $('#state_query').val(e.target.id);

    this.toggleDropdown();
  }
}