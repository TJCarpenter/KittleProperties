<style>
    .newPropertyForm {
        max-width: 100% !important;
        display: grid;
        grid-template-columns: 1.3fr 1fr;
        grid-template-rows: 1fr;
        grid-template-areas:
            "input display";
    }

    .input {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        grid-area: input;
    }

    .display {
        grid-area: display;
        height: 100vh;
    }

    .display #displayListing {
        position: relative;
        top: 0;
        left: 0;
    }

    .inputSectionTitle {
        margin-top: 2rem;
        margin-bottom: 0;
    }

    hr {
        margin-top: 0.125rem !important;
        margin-bottom: 0 !important;
    }

    .checkboxGroup {
        display: block;
    }

    .input-group input[type="text"],
    .input-group select {
        width: 100%;
    }

    input[type="text"]:disabled {
      background-color: #efefef;
    }

    div.input-group {
        margin-top: 1rem;
    }

    .input-inline-group {
      display: inline-flex;
      width: 100%;
    }

    .flex-end {
      align-items: flex-end;
    }

    .inline-group-item {
      flex: auto;
      display: flex;
      flex-flow: column;
    }

    .flex-1 {
      flex: 1 !important;
    }

    .flex-2 {
      flex: 2 !important;
    }

    .flex-3 {
      flex: 3 !important;
    }

    .inline-group-item:first-child {
      margin-left: 0;
    }

    .inline-group-item {
      margin: 0 0.5rem;
    }

    .inline-group-item:last-child {
      margin-right: 0;
    }

    .new-property_state_dropdown {
      display: inline-flex;
      align-items: stretch;
      position: relative;
    }
    .new-property_state_dropdown_button_img{
      height: 25px;
      width: 25px;
      filter: brightness(0%);
    }

    .new-property_state_dropdown_button {
      padding: 0.5rem;
      background-color: #fff;
      border-radius: 0px;
      border: solid 1px #ccc;
      border-left: none;
    }

    .new-property_state_dropdown_button:hover,
    .new-property_state_dropdown_button:focus,
    .new-property_state_dropdown_button:active {
      background-color: #ffffff;
    }

    .new-property_state {
      border-right: 0px !important;
      outline: none;
      width: 100%;
    }

    .new-property_state:focus {
      outline: none !important;
      border: solid 1px #ccc !important;
      border-right: 0px !important;
    }

    .new-property_state-dropdown-content {
        background-color: #fff;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        display: block;
        height: 0%;
        min-width: 100%;
        overflow-x: hidden;
        overflow: scroll;
        position: absolute;
        top: 57px;
        z-index: 1;
    }

    .new-property_state-dropdown-content span {
        color: black;
        display: block;
        font-size: 17.5px;
        padding: 10px 15px;
        text-decoration: none;
    }

    .new-property_state-dropdown-content span:hover {
        background-color: #ddd;
        cursor: pointer;
    }

    .new-property_state-dropdown-content::-webkit-scrollbar {
        width: 14px;
    }

    .new-property_state-dropdown-content::-webkit-scrollbar-thumb {
        background-clip: padding-box;
        background-color: #000000;
        border-radius: 9999px;
        border: 4px solid rgba(0, 0, 0, 0);
    }


    #displayListing {
        margin: 1rem auto;
        box-shadow: #aeaeae 10px 10px 10px;
        border: 2px solid #efefef;
    }

    .input-group_header {
      display: inline-flex;
      align-items: center;
    }

    .input-group_title_image {
      margin-left: 0.5rem;
      height: 25px;
      width: 25px;
    }

    .success {
        border: 1px solid #5BBA6F !important;
        /* color: #5BBA6F !important; */
    }

    .error {
        border: 1px solid #D63230 !important;
        color: #D63230 !important;
    }
    .error-message {
        display: inline-flex;
        align-items: center;
        margin-top: 0.5rem;
        background-color: #efefef;
    }

    .error-message_text {
        margin: 0;
        padding: 0 0.5rem;
        color: #D63230;
    }

    .error-message img {
        height: 25px;
        width: 25px;
        margin-left: 0.5rem;
    }

</style>

<div class="new-property-form PropertyForm">
    <div class="input">
        <form action="http://127.0.0.1/wp/wp-json/api/v2/append" method="POST">

            <div class="slide-form" id='slide_1'>
                <h5 class="input-section-title inputSectionTitle">Property Identifiers</h5>
                <hr>
                <div class="input-inline-group">
                  <div class="inline-group-item flex-1">
                    <span class="input-group_header">
                      <h5 class="input-group_header_text">ID</h5>
                      <img class="js-error-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                      <img class="js-success-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
                    </span>
                    <input class="js-new-property_id" type="text" name="property-id" id="property-id">
                    <div class="js-error-message error-message" style="display: none">
                      <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                      <p class="js-error-message_text error-message_text"></p>
                    </div>
                  </div>

                  <div class="inline-group-item flex-3">
                    <span class="input-group_header">
                      <h5 class="input-group_header_text">NAME</h5>
                      <img class="js-error-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                      <img class="js-success-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
                    </span>
                    <input class="js-new-property_name" type="text" name="property-name" id="property-name">
                    <div class="js-error-message error-message" style="display: none">
                      <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                      <p class="js-error-message_text error-message_text"></p>
                    </div>
                  </div>
                </div>
            </div>

            <div class="slide-form" id="slide_2">
              <h5 class="inputSectionTitle">Address</h5>
              <hr>

              <div class="input-group">
                <span class="input-group_header">
                  <h5 class="input-group_header_text">ADDRESS</h5>
                  <img class="js-error-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                  <img class="js-success-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
                </span>
                <input class="js-new-property_address" type="text" name="property-address" id="property-address">
                <div class="js-error-message error-message" style="display: none">
                  <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>

              <div class="input-inline-group">

                <div class="inline-group-item">
                  <span class="input-group_header">
                    <h5 class="input-group_header_text">CITY</h5>
                    <img class="js-error-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                    <img class="js-success-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
                  </span>
                  <input class="js-new-property_city" type="text" name="property-city" id="property-city">
                  <div class="js-error-message error-message" style="display: none">
                    <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                    <p class="js-error-message_text error-message_text"></p>
                  </div>
                </div>

                <div class="inline-group-item">
                  <span class="input-group_header">
                    <h5 class="input-group_header_text">STATE</h5>
                    <img class="js-error-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                    <img class="js-success-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
                  </span>
                  <div class="js-new-property_state_dropdown new-property_state_dropdown">
                    <input class="js-new-property_state new-property_state" type="text" name="property-state" readonly>
                    <button class="js-new-property_state_dropdown_button new-property_state_dropdown_button" type="button">
                      <img class="new-property_state_dropdown_button_img" src="https://kittleproperties.com/wp-content/uploads/2021/07/dropdown_primary.png" alt="dropdown">
                    </button>
                    <div class="js-new-property_state-dropdown-content new-property_state-dropdown-content">
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Alabama" id="AL">Alabama</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Alaska" id="AK">Alaska</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Arizona" id="AZ">Arizona</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Arkansas" id="AR">Arkansas</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="California" id="CA">California</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Colorado" id="CO">Colorado</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Connecticut" id="CT">Connecticut</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Delaware" id="DE">Delaware</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Florida" id="FL">Florida</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Georgia" id="GA">Georgia</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Hawaii" id="HI">Hawaii</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Idaho" id="ID">Idaho</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Illinois" id="IL">Illinois</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Indiana" id="IN">Indiana</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Iowa" id="IA">Iowa</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Kansas" id="KS">Kansas</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Kentucky" id="KY">Kentucky</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Louisiana" id="LA">Louisiana</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Maine" id="ME">Maine</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Maryland" id="MD">Maryland</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Massachusetts" id="MA">Massachusetts</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Michigan" id="MI">Michigan</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Minnesota" id="MN">Minnesota</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Mississippi" id="MS">Mississippi</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Missouri" id="MO">Missouri</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Montana" id="MT">Montana</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Nebraska" id="NE">Nebraska</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Nevada" id="NV">Nevada</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="New Hampshire" id="NH">New Hampshire</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="New Jersey" id="NJ">New Jersey</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="New Mexico" id="NM">New Mexico</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="New York" id="NY">New York</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="North Carolina" id="NC">North Carolina</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="North Dakota" id="ND">North Dakota</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Ohio" id="OH">Ohio</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Oklahoma" id="OK">Oklahoma</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Oregon" id="OR">Oregon</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Pennsylvania" id="PA">Pennsylvania</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Rhode Island" id="RI">Rhode Island</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="South Carolina" id="SC">South Carolina</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="South Dakota" id="SD">South Dakota</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Tennessee" id="TN">Tennessee</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Texas" id="TX">Texas</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Utah" id="UT">Utah</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Vermont" id="VT">Vermont</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Virginia" id="VA">Virginia</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Washington" id="WA">Washington</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="West Virginia" id="WV">West Virginia</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Wisconsin" id="WI">Wisconsin</span>
                      <span class="dropdown-item js-new-property_state-dropdown-item" value="Wyoming" id="WY">Wyoming</span>
                    </div>
                  </div>
                  <div class="js-error-message error-message" style="display:none">
                    <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                    <p class="js-error-message_text error-message_text">Error: There was an error</p>
                  </div>
                </div>

                <div class="inline-group-item">
                  <span class="input-group_header">
                    <h5 class="input-group_header_text">ZIPCODE</h5>
                    <img class="js-error-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                    <img class="js-success-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
                  </span>
                  <input class="js-new-property_zipcode" type="text" name="property-zipcode" id="property-zipcode">
                  <div class="js-error-message error-message" style="display: none">
                    <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                    <p class="js-error-message_text error-message_text"></p>
                  </div>
                </div>
              </div>

              <div class="input-inline-group flex-end">
                <div class="inline-group-item">
                  <span class="input-group_header">
                    <h5 class="input-group_header_text">LATITUDE</h5>
                    <img class="js-error-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                    <img class="js-success-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
                  </span>
                  <input class="js-new-property_latitude" type="text" name="property-latitude" id="property-latitude" disabled readonly>
                  <div class="js-error-message error-message" style="display: none">
                    <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                    <p class="js-error-message_text error-message_text"></p>
                  </div>
                </div>

                <div class="inline-group-item">
                  <span class="input-group_header">
                    <h5 class="input-group_header_text">LONGITUDE</h5>
                    <img class="js-error-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                    <img class="js-success-image input-group_title_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
                  </span>
                  <input class="js-new-property_longitude" type="text" name="property-longitude" id="property-longitude" disabled readonly>
                  <div class="js-error-message error-message" style="display: none">
                    <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                    <p class="js-error-message_text error-message_text"></p>
                  </div>
                </div>

                <div class="inline-group-item ">
                  <button class="js-new-property_lat_lon_button" type="button">Get Position</button>
                </div>
              </div>
              <div class="position-error">
                <span class="js-new-property_position" style="display: none;"></span>
                <div class="js-error-message error-message" style="display: none">
                  <img src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>

            </div>

            <h5 class="inputSectionTitle">Property Attributes</h5>
            <hr>
            <div class="js-new-new-property_housing-type-dropdown new-new-property_housing-type-dropdown">
              <input class="js-new-property_housing-type new-property_housing-type" type="text" name="property-housing-type" readonly>
              <button class="js-new-new-property_housing-type-dropdown_button new-new-property_housing-type-dropdown_button" type="button">
                <img class="new-new-property_housing-type-dropdown_button_img" src="https://kittleproperties.com/wp-content/uploads/2021/07/dropdown_primary.png" alt="dropdown">
              </button>
              <div class="js-new-property_housing-type-dropdown-content new-property_housing-type-dropdown-content">
                <span class="dropdown-item js-new-property_housing-type-dropdown-item" id="family">Family</span>
                <span class="dropdown-item js-new-property_housing-type-dropdown-item" id="senior">Senior</span>
                <span class="dropdown-item js-new-property_housing-type-dropdown-item" id="student">Student</span>
              </div>
            </div>
            <div class="input-group">
                <h5>Housing Type</h5>
                <select name="propertyHousingType" id="propertyHousingType">
                    <option value="default">Select Housing Type</option>
                    <option value="family">Family</option>
                    <option value="senior">Senior</option>
                    <option value="student">Student</option>
                </select>
            </div>

            <div class="input-group">
                <h5>Affordability</h5>
                <select name="propertyAffordability" id="propertyAffordability">
                    <option value="default">Select Affordability</option>
                    <option value="affordable">Affordable</option>
                    <option value="luxury">Luxury</option>
                    <option value="marketRate">Market Rate</option>
                    <option value="marketRateAffordable">Market Rate & Affordable</option>
                </select>
            </div>

            <div class="input-group">
                <h5>Sister Property</h5>
                <label for="propertyHasSisterProperty">Sister Property</label>
                <input type="checkbox" name="propertyHasSisterProperty" id="propertyHasSisterProperty">
            </div>

            <div class="input-group">
                <h5>Sister Property ID</h5>
                <input type="text" name="propertySisterPropertyID" id="propertySisterPropertyID">
            </div>

            <div class="input-group">
                <h5>Tags</h5>
                <div class="checkboxGroup">
                    <label for="tag1">Under Construction</label>
                    <input type="checkbox" id="tag1" name="tag1" value="tag1">
                </div>
                <div class="checkboxGroup">
                    <label for="tag2">Now Accepting Applications</label>
                    <input type="checkbox" id="tag2" name="tag2" value="tag2">
                </div>
                <div class="checkboxGroup">
                    <label for="tag3">Immediate Move In’s Available</label>
                    <input type="checkbox" id="tag3" name="tag3" value="tag3">
                </div>
                <div class="checkboxGroup">
                    <label for="tag4">Waitlist is Open</label>
                    <input type="checkbox" id="tag4" name="tag4" value="tag4">
                </div>
                <div class="checkboxGroup hide">
                    <label for="tag5">OPEN TAG</label>
                    <input type="checkbox" id="tag5" name="tag5" value="tag5">
                </div>
                <div class="checkboxGroup hide">
                    <label for="tag6">OPEN TAG</label>
                    <input type="checkbox" id="tag6" name="tag6" value="tag6">
                </div>
                <div class="checkboxGroup hide">
                    <label for="tag7">OPEN TAG</label>
                    <input type="checkbox" id="tag7" name="tag7" value="tag7">
                </div>
                <div class="checkboxGroup hide">
                    <label for="tag8">OPEN TAG</label>
                    <input type="checkbox" id="tag8" name="tag8" value="tag8">
                </div>
                <div class="checkboxGroup hide">
                    <label for="tag9">OPEN TAG</label>
                    <input type="checkbox" id="tag9" name="tag9" value="tag9">
                </div>
                <div class="checkboxGroup hide">
                    <label for="tag10">OPEN TAG</label>
                    <input type="checkbox" id="tag10" name="tag10" value="tag10">
                </div>
            </div>

            <h5 class="inputSectionTitle">Media</h5>
            <hr>
            <div class="input-group">
                <h5>Website</h5>
                <input type="text" name="propertyWebsite" id="propertyWebsite">
            </div>

            <div class="input-group">
                <h5>Phone Number</h5>
                <input type="text" name="propertyPhoneNumber" id="propertyPhoneNumber">
            </div>

            <div class="input-group">
                <h5>Email Address</h5>
                <input type="text" name="propertyEmailAddress" id="propertyEmailAddress">
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>


        </form>
    </div>
    <div class="display">

        <div class="LISTING" id="displayListing">
            <div class="LISTING-INFO-AREA">
                <div class="LISTING-INFO">
                    <h4 class="display_property-name js-display_property-name">{Property Name}</h4>
                    <h6 class="display_property-address js-display_property-address">{Property Address}, {Property City}, {Property State}</h6>
                </div>
                <div class="TAG">

                </div>
                <div class="LISTING-LINK">
                    <a class="LISTING-WEBSITE" href="http://www.batesville-apartments.com">WEBSITE</a>
                </div>
            </div>
            <div class="PROPERTY-IMAGE-AREA">
                <img class="property_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/07/kittle_placeholder.png"
                    alt="apartment_image">
            </div>
        </div>

    </div>
</div>

<script>

    $(document).ready(() => {

        //const AddProperty = new Controller(new Model(), new View());

        // Get List of ID's already in use
        model = new AddModel();

          /**
          * Function to open and close the dropdown state select
          */
        function toggle_Dropdown(e) {
          if ($('.js-new-property_state-dropdown-content').height() > 0 || e.type == 'focusout') {
            $('.js-new-property_state-dropdown-content').animate({
              height: '0px',
            });
          } else {
            $('.js-new-property_state-dropdown-content').animate({
              height: '50vh',
            });
          }
        }

        /**
        * Function to add the selected dropdown item to the filter and close the dropdown
        */
        function dropdown_ContentSelect(e) {
          $('.js-new-property_state').val(e.target.id);

          toggle_Dropdown();
        }

        /**
         * The displayErrorMessage function displays an error message on the given element
         * @param {Object} element
         * @param {String} message
         */
        function displayErrorMessage(element, message) {

          // Get the parent element
          parentElement = element.parent();

          // Find each element within the parent
          let errorImage = parentElement.find('.js-error-image');
          let successImage = parentElement.find('.js-success-image');
          let errorText = parentElement.find('.js-error-message_text');
          let errorMessage = parentElement.find('.js-error-message');

          // Fade any success images out
          $(successImage).fadeOut(1);

          // Fade error image in
          $(errorImage).fadeIn(100);

          // Remove success class and add error class
          element.removeClass('success').addClass('error');

          // Set the error text
          $(errorText).html(message);

          // Fade the error message in
          $(errorMessage).fadeIn(100);
        }

        /**
         * The displaySuccess function displays a success on a given element
         * @param {Object} element
         */
        function displaySuccess(element) {

          // Get the parent element
          parentElement = element.parent();

          // Find each element within the parent
          let errorImage = parentElement.find('.js-error-image');
          let successImage = parentElement.find('.js-success-image');
          let errorMessage = parentElement.find('.js-error-message');

          // Fade any error messages out
          $(errorMessage).fadeOut(1);

          // Fade any error images out
          $(errorImage).fadeOut(1);

          // Add success class and remove error class
          element.addClass('success').removeClass('error');

          // Fade success image in
          $(successImage).fadeIn(100);
        }

        /**
         * The clearErrorAndSuccess function removes any error or success on a given element
         * @param {Object} element
         */
        function clearErrorAndSuccess(element) {

          // Get the parent element
          parentElement = element.parent();

          // Find each element within the parent
          let errorImage = parentElement.find('.js-error-image');
          let successImage = parentElement.find('.js-success-image');
          let errorMessage = parentElement.find('.js-error-message');

          // Fade any success images out
          $(successImage).fadeOut(100);

          // Face any error images out
          $(errorImage).fadeOut(100);

          // Fade any error messages out
          $(errorMessage).fadeOut(100);

          // Remove any error or success class
          element.removeClass('error success');
        }

        // ===== ID =====
        $('.js-new-property_id').bind('input focusout', (e) => {
          let newID = e.target.value;

          // Tests
          let isNumber = /^\d+$/.test(newID);
          let isEmpty = newID === '';
          let isGreaterThanThreeDigits = newID > 99;

          if (!isNumber && !isEmpty) {
            // Contains Non-numeric Values
            displayErrorMessage($('.js-new-property_id'), 'Error: ID must contain only numeric values.');

          } else if(!isEmpty){
            if (isGreaterThanThreeDigits) {
              model.getPropertyIDs().then((response) => {

                // Tests
                let isNotValidID = response.includes(newID);

                if (isNotValidID) {
                  // ID Already Exists
                  displayErrorMessage($('.js-new-property_id'), 'Error: ID Already Exists.');
                } else {
                  // Valid New ID
                  displaySuccess($('.js-new-property_id'));
                }
              });

            } else {
              // ID Not Large Enough
              displayErrorMessage($('.js-new-property_id'), 'Error: ID must be greater than 99.');
            }
          } else {
            // ID Empty
            displayErrorMessage($('.js-new-property_id'), 'Error: ID cannot be empty.');
          }
        })

        // ===== NAME =====
        $('.js-new-property_name').bind('input focusout', (e) => {
          let newName = e.target.value;

          // Tests
          isEmpty = newName === '';

          if (!isEmpty) {
            // Not Empty
            displaySuccess($('.js-new-property_name'));
          } else {
            // Empty
            displayErrorMessage($('.js-new-property_name'), 'Error: Name cannot be empty.');
          }

        });

        // ===== ADDRESS =====
        $('.js-new-property_address').bind('input focusout', (e) => {
          let newAddress = e.target.value;

          // Tests
          let isEmpty = newAddress === '';

          if (!isEmpty) {
            // Not Empty
            displaySuccess($('.js-new-property_address'));
          } else {
            // Empty
            displayErrorMessage($('.js-new-property_address'), 'Error: Address cannot be empty.')
          }
        });

        // ===== CITY =====
        $('.js-new-property_city').bind('input focusout', (e) => {
          let newCity = e.target.value;

          // Tests
          let isEmpty = newCity === '';

          if (!isEmpty) {
            // Not Empty
            displaySuccess($('.js-new-property_city'));
          } else {
            // Empty
            displayErrorMessage($('.js-new-property_city'), 'Error: City cannot be empty.')
          }
        });

        // ===== STATE =====
        $('.js-new-property_state_dropdown_button').bind('click focusout', (e) => {
          toggle_Dropdown(e);

          let newState = $('.js-new-property_state').val();

          // Tests
          if (e.type === 'focusout') {
            let isEmpty = newState === '';

            if (!isEmpty) {
              // Not Empty
              $('.js-new-property_state, .js-new-property_state_dropdown_button').css('border', '0px');
              displaySuccess($('.js-new-property_state_dropdown'));
            } else {
              $('.js-new-property_state, .js-new-property_state_dropdown_button').css('border', '0px');
              displayErrorMessage($('.js-new-property_state_dropdown'), 'Error: State cannot be empty.');
            }

          }
        });

        $('.js-new-property_state-dropdown-item').bind('mousedown', (e) => {
          dropdown_ContentSelect(e);
          displaySuccess($('.js-new-property_state_dropdown'));
        });

        // ===== ZIPCODE =====
        $('.js-new-property_zipcode').bind('input focusout', (e) => {
          let newZipcode = e.target.value;

          // Tests
          let isEmpty = newZipcode === '';
          let isValidZipcode = /(^\d{5}$)|(^\d{5}-\d{4}$)/.test(newZipcode);

          if(isValidZipcode && !isEmpty) {
            // Valid Zipcode
            displaySuccess($('.js-new-property_zipcode'));
          } else if(!isValidZipcode && !isEmpty) {
            // Invalid Zipcode
            displayErrorMessage($('.js-new-property_zipcode'), 'Error: Invalid format.')
          } else {
            displayErrorMessage($('.js-new-property_zipcode'), 'Error: Zipcode cannot be empty.')
          }
        });


        // ===== LAT AND LON =====
        $('.js-new-property_lat_lon_button').bind('click', (e) => {
          let errorMessage = '';

          let enteredAddress = $('.js-new-property_address').val();
          // Address Test
          let addressEmpty = enteredAddress === '';

          if(addressEmpty) {
            errorMessage += '<br/><b>&emsp;&bull;&nbsp;Address cannot be empty.</b>';
            displayErrorMessage($('.js-new-property_address'), 'Error: Address cannot be empty.');
          }

          let enteredCity = $('.js-new-property_city').val();
          // City Test
          let cityEmpty = enteredCity === '';

          if (cityEmpty) {
            errorMessage += '<br/><b>&emsp;&bull;&nbsp;City cannot be empty.</b>';
            displayErrorMessage($('.js-new-property_city'), 'Error: City cannot be empty.');
          }

          let enteredState = $('.js-new-property_state').val();
          // State Test
          let stateEmpty = enteredState === '';

          if (stateEmpty) {
            errorMessage += '<br/><b>&emsp;&bull;&nbsp;State cannot be empty.</b>';
            displayErrorMessage($('.js-new-property_state_dropdown'), 'Error: State cannot be empty.');
          }

          let enteredZipcode = $('.js-new-property_zipcode').val();
          // Zipcode Test
          let zipcodeEmpty = enteredZipcode === '';
          let isValidZipcode = /(^\d{5}$)|(^\d{5}-\d{4}$)/.test(enteredZipcode);

          if(!isValidZipcode && !zipcodeEmpty) {
            errorMessage += '<br/><b>&emsp;&bull;&nbsp;Invalid Zipcode format.</b>';
            displayErrorMessage($('.js-new-property_zipcode'), 'Error: Invalid format.')
          } else if(zipcodeEmpty) {
            errorMessage += '<br/><b>&emsp;&bull;&nbsp;Zipcode cannot be empty.</b>';
            displayErrorMessage($('.js-new-property_zipcode'), 'Error: Zipcode cannot be empty.')
          }

          if (errorMessage === '') {
            let accessKey = '3b125cea3d1d33d544f0d76717a8c6dd';
            let query = encodeURI(`${enteredAddress} ${enteredState}, ${enteredCity}, ${enteredZipcode}`);
            let endpoint = `http://api.positionstack.com/v1/forward?access_key=${accessKey}&query=${query}`;

            fetch(endpoint).then((response) => {
              return response.json()
            }).then((response) => {
               $('.js-new-property_latitude').val(response.data[0].latitude);
               $('.js-new-property_longitude').val(response.data[0].longitude);

               displaySuccess($('.js-new-property_latitude'));
               displaySuccess($('.js-new-property_longitude'));
            });
          } else {
            displayErrorMessage($('.js-new-property_position'), errorMessage.slice(5))
          }


        })




        // Sticky Top for the display
        $(window).scroll(function () {
            if( $('.display').offset().top - $(window).scrollTop() < 50) {
                if ($('.display').offset().top - $(window).scrollTop() > 50) {
                    $('#displayListing').offset({top: $('.display').offset().top + 25});
                } else {
                    $('#displayListing').offset({top: $(window).scrollTop() + 50});
                }
            }
        });

        // Update Property Name
        $('#propertyName').on('input', (e) => {
            if($(e.target).val() == '') {
                $('.js-display_property-name').text('{Property Name}');
            } else {
                $('.js-display_property-name').text($(e.target).val());
            }
        });

        $('#propertyAddress').on('input', (e) => {
            if ($(e.target).val() == '') {
                $('.property_address').text('{Property Address}');
            } else {
                $('.property_address').text($(e.target).val());
            }
        });

        $('#propertyAddress, #propertyCity, #propertyState').on('input', () => {

            // Address Input
            let propertyAddress = $('#propertyAddress').val() == '' ? '{Property Addresss}' : $('#propertyAddress').val();

            // City Input
            let propertyCity = $('#propertyCity').val() == '' ? '{Property City}' : $('#propertyCity').val();

            // State Input
            let propertyState = $('#propertyState').val() == 'default' ? '{Property State}' : $('#propertyState').val();

            $('.property_address').text(`${propertyAddress}, ${propertyCity}, ${propertyState}`);

        });
    })

</script>
