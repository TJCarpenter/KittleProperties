<?php

?>

<!-- “ Code is like humor. When you have to explain it, it’s bad.” – Cory House -->

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
		  crossorigin="" />


	<!-- MarkerCluster Style -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"
		  integrity="sha512-RLEjtaFGdC4iQMJDbMzim/dOvAu+8Qp9sw7QE4wIMYcg2goVoivzwgSZq9CsIxp4xKAZPKh5J2f2lOko2Ze6FQ=="
		  crossorigin="anonymous" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"
		  integrity="sha512-BBToHPBStgMiw0lD4AtkRIZmdndhB6aQbXpX7omcrXeG2PauGBl2lzq2xUZTxaLxYz5IDHlmneCZ1IJ+P3kYtQ=="
		  crossorigin="anonymous" />

	<!-- LeafletJS Style -->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
			integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
			crossorigin=""></script>

	<!-- Library for Marker Clustering -->
	<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"
			integrity="sha512-MQlyPV+ol2lp4KodaU/Xmrn+txc1TP15pOBF/2Sfre7MRsA/pB4Vy58bEqe9u7a7DczMLtU5wT8n7OblJepKbg=="
			crossorigin="anonymous"></script>

	<!-- EasyButton -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
	<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>

	<!-- Gesture Handling -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet-gesture-handling@1.2.1/dist/leaflet-gesture-handling.min.css" type="text/css">
	<script src="https://unpkg.com/leaflet-gesture-handling@1.2.1/dist/leaflet-gesture-handling.min.js"></script>

	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__, 2)) . "/style/map.css"; ?>">
  <link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__, 2)) . "/style/listing.css"; ?>">
  <link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__, 2)) . "/style/filterGroup.css"; ?>">
  <link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__, 2)) . "/style/markerStyle.css"; ?>">
  <link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__, 2)) . "/style/Style.css"; ?>">


</head>
    <canvas></canvas>
    <div class="map-container">
        <div id="map">
            <div class="filter-menu js-filter-menu">
                <div class="filter-menu_header js-filter-menu_header" style="display: none;">
                    <h2 class="filter-menu_header_title">FILTER</h2>
                    <span class="js-filter-menu_header_close filter-menu_header_close" id="closeFilterMenuButton">
                        <img class="filter-menu_header_close_img" src="https://kittleproperties.com/wp-content/uploads/2021/07/close_white.png" alt="close">
                    </span>
                </div>
                <div class="filter-menu_body js-filter-menu_body" style="display: none;">
                    <div class="filter-group_text autocomplete js-autocomplete">
                        <input class="js-search-input search-input" type="text" placeholder="Search Property" name="search" autocomplete="off">
                        <button class="js-search-clear-button" type="button"><img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/clear.png" alt="clear"></button>
                        <button class="js-search-button" type="button"><img
                                src="https://kittleproperties.com/wp-content/uploads/2021/07/search_primary.png" alt="search"></button>
                    </div>
                    <div class="filter-group_text dropdown">
                        <input id="state_query" class="js-state-input" type="text" value="" placeholder="Select State" name="state" readonly>
                        <button class="js-dropdown-button"><img
                                src="https://kittleproperties.com/wp-content/uploads/2021/07/dropdown_primary.png"
                                alt="dropdown"></button>
                        <div class="js-dropdown-content dropdown-content">
							<span class="dropdown-item js-dropdown-item" id="AL" >Alabama</span>
                            <span class="dropdown-item js-dropdown-item" id="AK" >Alaska</span>
							<span class="dropdown-item js-dropdown-item" id="AZ" >Arizona</span>
							<span class="dropdown-item js-dropdown-item" id="AR" >Arkansas</span>
                            <span class="dropdown-item js-dropdown-item" id="CA" >California</span>
                            <span class="dropdown-item js-dropdown-item" id="CO" >Colorado</span>
                            <span class="dropdown-item js-dropdown-item" id="CT" >Connecticut</span>
                            <span class="dropdown-item js-dropdown-item" id="DE" >Delaware</span>
                            <span class="dropdown-item js-dropdown-item" id="FL" >Florida</span>
                            <span class="dropdown-item js-dropdown-item" id="GA" >Georgia</span>
                            <span class="dropdown-item js-dropdown-item" id="HI" >Hawaii</span>
                            <span class="dropdown-item js-dropdown-item" id="ID" >Idaho</span>
                            <span class="dropdown-item js-dropdown-item" id="IL" >Illinois</span>
                            <span class="dropdown-item js-dropdown-item" id="IN" >Indiana</span>
                            <span class="dropdown-item js-dropdown-item" id="IA" >Iowa</span>
                            <span class="dropdown-item js-dropdown-item" id="KS" >Kansas</span>
                            <span class="dropdown-item js-dropdown-item" id="KY" >Kentucky</span>
                            <span class="dropdown-item js-dropdown-item" id="LA" >Louisiana</span>
                            <span class="dropdown-item js-dropdown-item" id="ME" >Maine</span>
                            <span class="dropdown-item js-dropdown-item" id="MD" >Maryland</span>
                            <span class="dropdown-item js-dropdown-item" id="MA" >Massachusetts</span>
                            <span class="dropdown-item js-dropdown-item" id="MI" >Michigan</span>
                            <span class="dropdown-item js-dropdown-item" id="MN" >Minnesota</span>
                            <span class="dropdown-item js-dropdown-item" id="MS" >Mississippi</span>
                            <span class="dropdown-item js-dropdown-item" id="MO" >Missouri</span>
                            <span class="dropdown-item js-dropdown-item" id="MT" >Montana</span>
                            <span class="dropdown-item js-dropdown-item" id="NE" >Nebraska</span>
                            <span class="dropdown-item js-dropdown-item" id="NV" >Nevada</span>
							<span class="dropdown-item js-dropdown-item" id="NH" >New Hampshire</span>
							<span class="dropdown-item js-dropdown-item" id="NJ" >New Jersey</span>
							<span class="dropdown-item js-dropdown-item" id="NM" >New Mexico</span>
							<span class="dropdown-item js-dropdown-item" id="NY" >New York</span>
							<span class="dropdown-item js-dropdown-item" id="NC" >North Carolina</span>
							<span class="dropdown-item js-dropdown-item" id="ND" >North Dakota</span>
                            <span class="dropdown-item js-dropdown-item" id="OH" >Ohio</span>
                            <span class="dropdown-item js-dropdown-item" id="OK" >Oklahoma</span>
                            <span class="dropdown-item js-dropdown-item" id="OR" >Oregon</span>
                            <span class="dropdown-item js-dropdown-item" id="PA" >Pennsylvania</span>
							<span class="dropdown-item js-dropdown-item" id="RI" >Rhode Island</span>
							<span class="dropdown-item js-dropdown-item" id="SC" >South Carolina</span>
							<span class="dropdown-item js-dropdown-item" id="SD" >South Dakota</span>
                            <span class="dropdown-item js-dropdown-item" id="TN" >Tennessee</span>
                            <span class="dropdown-item js-dropdown-item" id="TX" >Texas</span>
                            <span class="dropdown-item js-dropdown-item" id="UT" >Utah</span>
                            <span class="dropdown-item js-dropdown-item" id="VT" >Vermont</span>
                            <span class="dropdown-item js-dropdown-item" id="VA" >Virginia</span>
                            <span class="dropdown-item js-dropdown-item" id="WA" >Washington</span>
							<span class="dropdown-item js-dropdown-item" id="WV" >West Virginia</span>
                            <span class="dropdown-item js-dropdown-item" id="WI" >Wisconsin</span>
                            <span class="dropdown-item js-dropdown-item" id="WY" >Wyoming</span>
                        </div>
                    </div>
                    <div class="filter-group">
                        <h3>HOUSING TYPE</h3>
                        <label class="check_container">Family Housing
                            <input type="checkbox" class="js-checkbox-filter" name="housing_type" />
                            <span class="checkmark"></span>
                        </label>
                        <label class="check_container">Senior Housing
                            <input type="checkbox" class="js-checkbox-filter" name="housing_type"/>
                            <span class="checkmark"></span>
                        </label>
                        <!--<label class="check_container">Student Housing
                            <input type="checkbox" class="js-checkbox-filter" name="housing_type" />
                            <span class="checkmark"></span>
                        </label>-->
                    </div>
                    <div class="filter-group">
                        <h3>AFFORDABILITY</h3>
                        <label class="check_container">Affordable Housing
                            <input type="checkbox" class="js-checkbox-filter" name="affordability" />
                            <span class="checkmark"></span>
                        </label>
                        <label class="check_container">Luxury Apartments
                            <input type="checkbox" class="js-checkbox-filter" name="affordability" />
                            <span class="checkmark"></span>
                        </label>
                        <label class="check_container">Market Rate Housing
                            <input type="checkbox" class="js-checkbox-filter" name="affordability" />
                            <span class="checkmark"></span>
                        </label>
                        <label class="check_container">Market Rate & Affordable
                            <input type="checkbox" class="js-checkbox-filter" name="affordability"/>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="filter-group">
                        <button class="js-apply-filters" id="applyFilter">APPLY FILTERS</button>
                        <button class="js-reset-filters" id="reset" type="reset">CLEAR FILTERS</button>
                    </div>
                    <div class="filter-group">
                        <h3 class="search_result"></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="RESULTS grid" id="listingArea">
        </div>
    </div>

<script>
    $(document).ready(() => {
        console.log('.-.___.-. /[ Kittle Property Group ]\n\\_/_ _\\_/\n  )O_O(\n { (_) }\n  \'-^-\'\n');

        const KittleMap = new Controller(new Model(), new View());

    });
</script>