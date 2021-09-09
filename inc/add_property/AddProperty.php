<style>
    .new-property-form {
        max-width: 100% !important;
        display: grid;
        grid-template-columns: 1.3fr 1fr;
        grid-template-rows: 1fr;
        grid-template-areas:
            "input display";
        border: 1px solid #efefef;
    }

    .input {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        grid-area: input;
        background-color: #fff;
        padding: 1rem;
    }

    .display {
        grid-area: display;
        background-color: #f5f5f5;
        /* height: 100vh; */
    }

    .pagnation {
      padding: 1rem 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 1rem;
      border: 1px solid #efefef;
      border-bottom: none;
      border-left: none;
      background-color: #fff;
    }

    .pagnation button {
      width: 5rem;
    }

    .pagnation * {
      cursor: pointer;
    }

    .slide-pagnation {
      background-color: #e0e0e0;
      width: 10px;
      height: 10px;
      border-radius: 25px;
    }

    .slide-pagnation:hover {
      filter: brightness(96%)
    }

    .slide-pagnation-active {
      background-color: #0d47b3;
      box-shadow: 0 0 0 2px #0d47b3;
    }

    .slide-pagnation-filled {
      background-color: none;
      width: 26px;
      height: 26px;
      border-radius: none;
    }

    .submit {
      padding: 1rem 0 !important;
      display: flex;
      align-items: center;
      justify-content: space-evenly;
      background-color: #e5e5e5;
    }

    .submit button {
      width: 10rem;
    }

    .display .display-listing {
        position: relative;
        top: 0;
        left: 0;
    }

    .inputSectionTitle {
        margin-bottom: 0;
        margin-top: 0;
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

    input[type="text"]:read-only {
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

    .dropdown-wrapper {
      display: inline-flex;
      align-items: stretch;
      position: relative;
    }
    .dropdown-image{
      height: 25px;
      width: 25px;
      filter: brightness(0%);
    }

    .dropdown-button {
      padding: 0.5rem;
      background-color: #fff;
      border-radius: 0px;
      border: solid 1px #ccc;
      border-left: none;
    }

    .dropdown-button:hover,
    .dropdown-button:focus,
    .dropdown-button:active {
      background-color: #ffffff;
    }

    .dropdown-input {
      border-right: 0px !important;
      outline: none;
      width: 100%;
      text-transform: capitalize;
    }

    .dropdown-input:focus {
      outline: none !important;
      border: solid 1px #ccc !important;
      border-right: 0px !important;
    }

    .new-property-dropdown-content {
        background-color: #fff;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        display: block;
        height: 0%;
        min-width: 100%;
        overflow-x: hidden;
        overflow: auto;
        position: absolute;
        top: 57px;
        z-index: 1;
    }

    .new-property-dropdown-content span {
        color: black;
        display: block;
        font-size: 17.5px;
        padding: 10px 15px;
        text-decoration: none;
    }

    .new-property-dropdown-content span:hover {
        background-color: #ddd;
        cursor: pointer;
    }

    .new-property-dropdown-content::-webkit-scrollbar {
        width: 14px;
    }

    .new-property-dropdown-content::-webkit-scrollbar-thumb {
        background-clip: padding-box;
        background-color: #000000;
        border-radius: 9999px;
        border: 4px solid rgba(0, 0, 0, 0);
    }


    .display-listing {
      display: grid;
      margin: 1rem auto;
      width: 300px;
      background-color: #fff;
      box-shadow: #e0e0e0 5px 10px 10px;
      border-radius: 2px;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 0.5fr 1fr;
      grid-auto-columns: 1fr;
      gap: 0px 0px;
      grid-auto-flow: row;
      grid-template-areas:
        "display-content-image display-content-image"
        "display-content display-content";
    }

    .display-listing_image {
      grid-area: display-content-image;
    }

    .display-listing_image img {
      height: auto;
      padding: 1rem;
    }

    .display-listing_content {
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 0.25fr auto 0fr;
      gap: 0px 0px;
      grid-auto-flow: row;
      grid-template-areas:
        "display-info"
        "display-tag"
        "display-link";
      grid-area: display-content;

      padding: 0 0.5rem;
    }

    .display-listing_content_info {
      grid-area: display-info;
    }

    .display-tag {
        grid-area: display-tag;
        align-self: start;
        display: flex;
        align-items: flex-start;
        flex-flow: column;
    }
    .display-tag p {
        font-size: 0.8rem;
        padding: 0 0.5rem;
        border-radius: 2px;
        background-color: #0A154F;
        color: #fff;
        margin: 0.25rem 0rem;
    }

    .display-listing_content-link-wrapper {
      grid-area: display-link;
      align-self: end;
      justify-self: center;
      width: 100%;
      padding-bottom: 1rem;
    }

    .display-listing_content-link {
      background-color: #0f5ae6 !important;
      color: white !important;
      border-radius: 3px;
      padding: 0.5em 1.5em;
      text-decoration: none !important;
      text-transform: uppercase;
      display: inline-block;
      width: 100%;
      text-align: center;
    }
    .display-listing_content-link:hover {
      background-color: #0d47b3 !important;
    }

    .display-listing_content-link:active {
      background-color: black;
    }

    .display-listing_content-link:visited {
      background-color: #ccc;
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

    button.error {
      color: #fff !important;
      border: none !important;
    }

    .error-message {
        display: inline-flex;
        align-items: center;
        margin-left: 0.5rem;
        background-color: #efefef;
        border: 1px solid #e0e0e0;
        border-radius: 2px;
        box-shadow: 5px 5px 10px #e0e0e0;
        min-width: fit-content;
        width: max-content;
    }

    .error-tooltip {
      display: inline-flex;
      position: relative;
      align-items: center;
    }

    .error-tooltip .error-message {
      visibility:  hidden;

      position: absolute;
      left: 1.5rem;
      z-index: 1;
      width: max-content;
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

    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
      margin: 11px 0;
      margin-right: 1rem;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .1s;
      transition: .1s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .1s;
      transition: .1s;
    }

    input:checked + .slider {
      background-color: #0073aa;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #0073aa;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    .slide-form {
      height: 100%;
      padding: 0.25rem 0.5rem;
    }

    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1;
      padding: 2rem 0;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #efefef;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
    }

    /* The Close Button */
    .modal-close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .modal-close:hover,
    .modal-close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
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
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-property_id" type="text" name="property-id" id="property-id">
          </div>

          <div class="inline-group-item flex-3">
            <span class="input-group_header">
              <h5 class="input-group_header_text">NAME</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-property_name" type="text" name="property-name" id="property-name">
          </div>
        </div>
      </div>

      <div class="slide-form" id="slide_2">
        <h5 class="inputSectionTitle">Address</h5>
        <hr>

        <div class="input-group">
          <span class="input-group_header">
            <h5 class="input-group_header_text">ADDRESS</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
            <img class="js-success-image input-group_title_image"
              src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
          </span>
          <input class="js-new-property_address" type="text" name="property-address" id="property-address">
        </div>

        <div class="input-inline-group">

          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">CITY</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-property_city" type="text" name="property-city" id="property-city">
          </div>

          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">STATE</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <div class="js-new-property_state_dropdown dropdown-wrapper js-dropdown-wrapper" id="state">
              <input class="js-new-property_state js-dropdown-input dropdown-input" type="text" name="property-state">
              <button class="js-new-property_state_dropdown_button js-dropdown-button dropdown-button" type="button">
                <img class="dropdown-image"
                  src="https://kittleproperties.com/wp-content/uploads/2021/07/dropdown_primary.png" alt="dropdown">
              </button>
              <div
                class="js-new-property_state-dropdown-content js-new-property-dropdown-content new-property-dropdown-content">
                <span class="dropdown-item js-new-property_dropdown-item" value="Alabama" id="AL">Alabama</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Alaska" id="AK">Alaska</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Arizona" id="AZ">Arizona</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Arkansas" id="AR">Arkansas</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="California" id="CA">California</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Colorado" id="CO">Colorado</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Connecticut" id="CT">Connecticut</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Delaware" id="DE">Delaware</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Florida" id="FL">Florida</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Georgia" id="GA">Georgia</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Hawaii" id="HI">Hawaii</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Idaho" id="ID">Idaho</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Illinois" id="IL">Illinois</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Indiana" id="IN">Indiana</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Iowa" id="IA">Iowa</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Kansas" id="KS">Kansas</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Kentucky" id="KY">Kentucky</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Louisiana" id="LA">Louisiana</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Maine" id="ME">Maine</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Maryland" id="MD">Maryland</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Massachusetts"
                  id="MA">Massachusetts</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Michigan" id="MI">Michigan</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Minnesota" id="MN">Minnesota</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Mississippi" id="MS">Mississippi</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Missouri" id="MO">Missouri</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Montana" id="MT">Montana</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Nebraska" id="NE">Nebraska</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Nevada" id="NV">Nevada</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="New Hampshire" id="NH">New
                  Hampshire</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="New Jersey" id="NJ">New
                  Jersey</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="New Mexico" id="NM">New
                  Mexico</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="New York" id="NY">New York</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="North Carolina" id="NC">North
                  Carolina</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="North Dakota" id="ND">North
                  Dakota</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Ohio" id="OH">Ohio</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Oklahoma" id="OK">Oklahoma</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Oregon" id="OR">Oregon</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Pennsylvania"
                  id="PA">Pennsylvania</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Rhode Island" id="RI">Rhode
                  Island</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="South Carolina" id="SC">South
                  Carolina</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="South Dakota" id="SD">South
                  Dakota</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Tennessee" id="TN">Tennessee</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Texas" id="TX">Texas</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Utah" id="UT">Utah</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Vermont" id="VT">Vermont</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Virginia" id="VA">Virginia</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Washington" id="WA">Washington</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="West Virginia" id="WV">West
                  Virginia</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Wisconsin" id="WI">Wisconsin</span>
                <span class="dropdown-item js-new-property_dropdown-item" value="Wyoming" id="WY">Wyoming</span>
              </div>
            </div>
          </div>

          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">ZIPCODE</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-property_zipcode" type="text" name="property-zipcode" id="property-zipcode">
          </div>
        </div>

        <div class="input-inline-group flex-end">
          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">LATITUDE</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-property_latitude" type="text" name="property-latitude" id="property-latitude" readonly>
          </div>

          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">LONGITUDE</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-property_longitude" type="text" name="property-longitude" id="property-longitude" readonly>
          </div>

          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">&nbsp;</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <button class="js-new-property_lat_lon_button" type="button">Get Position</button>
          </div>
        </div>

        <div class="position-error">
          <span class="js-new-property_position" style="display: none;"></span>
          <div class="js-error-message error-message" style="display: none">
            <p class="js-error-message_text error-message_text"></p>
          </div>
        </div>

      </div>

      <div class="slide-form" id="slide_3">
        <h5 class="inputSectionTitle">Property Attributes</h5>
        <hr>
        <div class="input-inline-group">
          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">HOUSING TYPE</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <div class="js-new-property_housing-type_dropdown dropdown-wrapper js-dropdown-wrapper" id="housing-type">
              <input class="js-dropdown-input dropdown-input" type="text" name="property-housing-type" readonly>
              <button class="js-new-property_housing-type-dropdown_button js-dropdown-button dropdown-button"
                type="button">
                <img class="dropdown-image"
                  src="https://kittleproperties.com/wp-content/uploads/2021/07/dropdown_primary.png" alt="dropdown">
              </button>
              <div
                class="js-new-property_housing-type-dropdown-content js-new-property-dropdown-content new-property-dropdown-content">
                <span class="dropdown-item js-new-property_dropdown-item" id="family">Family</span>
                <span class="dropdown-item js-new-property_dropdown-item" id="senior">Senior</span>
                <span class="dropdown-item js-new-property_dropdown-item" id="student">Student</span>
              </div>
            </div>
          </div>

          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">AFFORDABILITY</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <div class="js-new-property_affordability_dropdown dropdown-wrapper js-dropdown-wrapper" id="affordability">
              <input class="js-dropdown-input dropdown-input" type="text" name="property-affordability" readonly>
              <button class="js-new-property_affordability-dropdown_button js-dropdown-button dropdown-button"
                type="button">
                <img class="dropdown-image"
                  src="https://kittleproperties.com/wp-content/uploads/2021/07/dropdown_primary.png" alt="dropdown">
              </button>
              <div
                class="js-new-property_affordability-dropdown-content js-new-property-dropdown-content new-property-dropdown-content">
                <span class="dropdown-item js-new-property_dropdown-item" id="affordable">Affordable</span>
                <span class="dropdown-item js-new-property_dropdown-item" id="luxury">Luxury</span>
                <span class="dropdown-item js-new-property_dropdown-item" id="marketRate">Market Rate</span>
                <span class="dropdown-item js-new-property_dropdown-item" id="marketRateAffordable">Market Rate &
                  Affordable</span>
              </div>
            </div>
          </div>
        </div>

        <div class="input-inline-group flex-end">

          <div class="inline-group-item flex-1">
            <span class="input-group_header">
              <h5 class="input-group_header_text">SISTER PROPERTY</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <label class="switch">
              <input class="js-new-sister-property" type="checkbox" name="sister-property">
              <span class="slider"></span>
            </label>
          </div>

          <div class="inline-group-item flex-1">
            <span class="input-group_header">
              <h5 class="input-group_header_text">SISTER PROPERTY ID</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-sister-property_id" type="text" name="sister-property-id" id="sister-property-id" disabled readonly>
          </div>

          <div class="inline-group-item flex-3">
            <span class="input-group_header">
              <h5 class="input-group_header_text">&nbsp;</h5>
            </span>
            <input class="js-sister-property-lookup" type="text" readonly>
          </div>
        </div>
      </div>


      <div class="slide-form" id="slide_4">
        <h5 class="inputSectionTitle">Tags</h5>
        <hr>

        <div class="input-group">

          <div class="input-group-item">
            <label class="switch">
              <input class="js-new-property-tags" type="checkbox" name="tag1">
              <span class="slider"></span>
            </label>
            <span class="input-group_header">
              <h5 class="input-group_header_text">Under Construction</h5>
            </span>
          </div>

          <div class="input-group-item">
            <label class="switch">
              <input class="js-new-property-tags" type="checkbox" name="tag2">
              <span class="slider"></span>
            </label>
            <span class="input-group_header">
              <h5 class="input-group_header_text">Now Accepting Applications</h5>
            </span>
          </div>

          <div class="input-group-item">
            <label class="switch">
              <input class="js-new-property-tags" type="checkbox" name="tag3">
              <span class="slider"></span>
            </label>
            <span class="input-group_header">
              <h5 class="input-group_header_text">Immediate Move In’s Available</h5>
            </span>
          </div>

          <div class="input-group-item">
            <label class="switch">
              <input class="js-new-property-tags" type="checkbox" name="tag4">
              <span class="slider"></span>
            </label>
            <span class="input-group_header">
              <h5 class="input-group_header_text">Waitlist is Open</h5>
            </span>
          </div>

        </div>
      </div>


      <div class="slide-form" id="slide_5">
        <h5 class="inputSectionTitle">Media</h5>
        <hr>

        <div class="input-group">
          <span class="input-group_header">
            <h5 class="input-group_header_text">WEBSITE</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
            <img class="js-success-image input-group_title_image"
              src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
          </span>
          <input class="js-new-property_website" type="text" name="property-website" id="property-website">
        </div>

        <div class="input-inline-group">

          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">PHONE NUMBER</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-property_phone-number" type="text" name="property-phone-number"
              id="property-phone-number">
          </div>

          <div class="inline-group-item">
            <span class="input-group_header">
              <h5 class="input-group_header_text">EMAIL ADDRESS</h5>
              <div class="error-tooltip">
                <img class="js-error-image error-image input-group_title_image"
                  src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
                <div class="js-error-message error-message" style="display: none">
                  <p class="js-error-message_text error-message_text"></p>
                </div>
              </div>
              <img class="js-success-image input-group_title_image"
                src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
            </span>
            <input class="js-new-property_email-address" type="text" name="property-email-address"
              id="property-email-address">
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="display">
    <div class="display-listing js-display-listing">
      <div class="display-listing_content">
        <div class="display-listing_content_info">
          <h4 class="display_property-name js-display_property-name">{Property Name}</h4>
          <h6 class="display_property-address js-display_property-address">{Property Address}, {Property City},
            {Property State}</h6>
        </div>
        <div class="display-tag">

        </div>
        <div class="display-listing_content-link-wrapper">
          <a class="display-listing_content-link" href="#" >WEBSITE</a>
        </div>
      </div>
      <div class="display-listing_image">
        <img class="display-property_image" src="http://127.0.0.1/wp/wp-content/uploads/2021/07/kittle_placeholder.png"
          alt="apartment_image">
      </div>
    </div>
  </div>

  <div class="pagnation">
    <div class="prev-button">
      <button class="btn js-slide_back" type="button">Back</button>
    </div>

    <div class="slide-pagnation slide-pagnation-active" id="slide-0">
      <img class="js-error-image error-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
      <img class="js-success-image success-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
    </div>
    <div class="slide-pagnation" id="slide-1">
      <img class="js-error-image error-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
      <img class="js-success-image success-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
    </div>
    <div class="slide-pagnation" id="slide-2">
      <img class="js-error-image error-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
      <img class="js-success-image success-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
    </div>
    <div class="slide-pagnation" id="slide-3">
      <img class="js-error-image error-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
      <img class="js-success-image success-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
    </div>
    <div class="slide-pagnation" id="slide-4">
      <img class="js-error-image error-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/error.png" style="display:none">
      <img class="js-success-image success-image" src="http://127.0.0.1/wp/wp-content/uploads/2021/08/success.png" style="display:none">
    </div>

    <div class="next-button">
      <button class="js-slide_next" type="button">Next</button>
    </div>
  </div>

  <div class="submit">
    <button class="js-submit-data" type="submit">Submit</button>
    <button class="js-preview-data js-modal-open" type="button">Preview Data</button>
  </div>

  <div class="modal js-modal">

    <div class="modal-content">
      <span class="js-modal-close modal-close">&times;</span>
      <table id="customers">
        <tr>
          <th>Key</th>
          <th>Value</th>
        </tr>
        <tr>
          <td>ID</td>
          <td class="js-preview-data_id"></td>
        </tr>
        <tr>
          <td>Property Name</td>
          <td class="js-preview-data_name"></td>
        </tr>
        <tr>
          <td>Address</td>
          <td class="js-preview-data_address"></td>
        </tr>
        <tr>
          <td>City</td>
          <td class="js-preview-data_city"></td>
        </tr>
        <tr>
          <td>State</td>
          <td class="js-preview-data_state"></td>
        </tr>
        <tr>
          <td>Zipcode</td>
          <td class="js-preview-data_zipcode"></td>
        </tr>
        <tr>
          <td>Latitude</td>
          <td class="js-preview-data_latitude"></td>
        </tr>
        <tr>
          <td>Longitude</td>
          <td class="js-preview-data_longitude"></td>
        </tr>
        <tr>
          <td>Housing Type</td>
          <td class="js-preview-data_housing-type"></td>
        </tr>
        <tr>
          <td>Affordability Type</td>
          <td class="js-preview-data_affordability"></td>
        </tr>
        <tr>
          <td>Sister Property</td>
          <td class="js-preview-data_sister-property"></td>
        </tr>
        <tr>
          <td>Sister Property ID</td>
          <td class="js-preview-data_sister-property_id"></td>
        </tr>
        <tr>
          <td>Tag 1</td>
          <td class="js-preview-data_tag1"></td>
        </tr>
        <tr>
          <td>Tag 2</td>
          <td class="js-preview-data_tag2"></td>
        </tr>
        <tr>
          <td>Tag 3</td>
          <td class="js-preview-data_tag3"></td>
        </tr>
        <tr>
          <td>Tag 4</td>
          <td class="js-preview-data_tag4"></td>
        </tr>
        <tr>
          <td>Website</td>
          <td class="js-preview-data_website"></td>
        </tr>
        <tr>
          <td>Phone Number</td>
          <td class="js-preview-data_phone-number"></td>
        </tr>
        <tr>
          <td>Email Address</td>
          <td class="js-preview-data_email-address"></td>
        </tr>
      </table>
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

          let dropdownContent = $(e.target).closest('.js-dropdown-wrapper').find('.js-new-property-dropdown-content');
          let dropdownSize = dropdownContent.children().outerHeight() * (dropdownContent.children().length);

          if (dropdownContent.height() > 0 || e.type == 'focusout') {
            dropdownContent.animate({
              height: '0px',
            });
          } else {
            dropdownContent.animate({
              height: dropdownSize > $(window).height() / 2 ? '50vh' : `${dropdownSize}px`,
            });
          }
        }

        /**
        * Function to add the selected dropdown item to the filter and close the dropdown
        */
        function dropdown_ContentSelect(e) {

          let dropdownInput = $(e.target).closest('.js-dropdown-wrapper').find('.js-dropdown-input');

          dropdownInput.val(e.target.id);

          toggle_Dropdown(e);
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
                  $('.js-preview-data_id').text(newID);
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
            $('.js-preview-data_name').text(newName);
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
            $('.js-preview-data_address').text(newAddress);
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
            $('.js-preview-data_city').text(newCity);
          } else {
            // Empty
            displayErrorMessage($('.js-new-property_city'), 'Error: City cannot be empty.')
          }
        });

        // ===== DROPDOWN =====
        $('.js-dropdown-button').bind('click focusout', (e) => {
          toggle_Dropdown(e);

          let dropdownInput = $(e.target).closest('.js-dropdown-wrapper').find('.js-dropdown-input');
          let dropdownButton = $(e.target).closest('.js-dropdown-wrapper').find('.js-dropdown-button');
          let dropdownWrapper = $(e.target).closest('.js-dropdown-wrapper');
          let dropdownName = dropdownWrapper.attr('id').replace('-', ' ').split(' ').map((word) => word[0].toUpperCase() + word.substring(1)).join(' ');
          let newDropdownValue = dropdownInput.val();

          // Tests
          if (e.type === 'focusout') {
            let isEmpty = newDropdownValue === '' || newDropdownValue === undefined;

            dropdownInput.css('border', '0px');
            dropdownButton.css('border', '0px');

            if (!isEmpty) {
              // Not Empty
              displaySuccess(dropdownWrapper);
              $(`.js-preview-data_${dropdownWrapper.attr('id')}`).text(newDropdownValue);
            } else {
              displayErrorMessage(dropdownWrapper, `Error: <b>${dropdownName}</b> cannot be empty.`);
            }
          }
        });

        $('.js-new-property_dropdown-item').bind('mousedown', (e) => {
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
            $('.js-preview-data_zipcode').text(newZipcode);
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
          let stateEmpty = enteredState === '' || enteredState === undefined;

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

              displaySuccess($('.js-new-property_longitude'))
              displaySuccess($('.js-new-property_latitude'));
              displaySuccess($('.js-new-property_lat_lon_button'));

              $('.js-preview-data_latitude').text(response.data[0].latitude);
              $('.js-preview-data_longitude').text(response.data[0].longitude);
            });
          } else {
            displayErrorMessage($('.js-new-property_lat_lon_button'), errorMessage.slice(5))
          }
        });

        // ===== SISTER PROPERTY =====
        $('.js-new-sister-property').change((e) => {
          let hasSisterProperty = $('.js-new-sister-property').prop('checked');

          if (hasSisterProperty) {
            $('.js-new-sister-property_id').prop('disabled', false).prop('readonly', false);
            $('.js-preview-data_sister-property').text('on');
          } else {
            $('.js-new-sister-property_id').prop('disabled', true).prop('readonly', true);
            $('.js-preview-data_sister-property').text('off');
            $('.js-new-sister-property_id, .js-sister-property-lookup').val('');
          }
        });

        $('.js-new-sister-property_id').bind('input focusout', (e) => {

          let newSisterID = e.target.value;

          // Tests
          let isNumber = /^\d+$/.test(newSisterID);
          let isEmpty = newSisterID === '';
          let isGreaterThanThreeDigits = newSisterID > 99;

          if (!isNumber && !isEmpty) {
            // Contains Non-numeric Values
            displayErrorMessage($('.js-new-sister-property_id'), 'Error: ID must contain only numeric values.');

          } else if(!isEmpty){
            if (isGreaterThanThreeDigits) {
              model.getPropertyIDs().then((response) => {

                // Tests
                let isValidID = response.includes(newSisterID);

                if (isValidID) {
                  // ID Exists
                  displaySuccess($('.js-new-sister-property_id'));
                  $('.js-preview-data_sister-property_id').text(newSisterID);

                  model.getPropertyNameFromID(newSisterID).then((response) => {
                    $('.js-sister-property-lookup').val(`${response[0].ID}: ${response[0].NAME}`);
                  })

                } else {
                  // ID Does Not Exist
                  displayErrorMessage($('.js-new-sister-property_id'), 'Error: ID Does Not Exist.');
                  $('.js-sister-property-lookup').val('');
                }
              });

            } else {
              // ID Not Large Enough
              displayErrorMessage($('.js-new-sister-property_id'), 'Error: Invalid ID. Must be greater than 99.');
              $('.js-sister-property-lookup').val('');
            }
          } else {
            // ID Empty
            displayErrorMessage($('.js-new-sister-property_id'), 'Error: ID cannot be empty.');
            $('.js-sister-property-lookup').val('');
          }

        });

        // ===== TAGS =====
        $('.js-new-property-tags').change((e) => {
          $('.js-new-property-tags').each((index, element) => {
            $(`.js-preview-data_tag${index + 1}`).text(element.checked);
          })
        })

        // ===== WEBSITE =====
        $('.js-new-property_website').bind('input focusout', (e) => {
          let newWebsite = e.target.value;

          // Tests
          let isEmpty = newWebsite === '';

          if (!isEmpty) {
            // Not Empty
            displaySuccess($('.js-new-property_website'));
            $('.js-preview-data_website').text(newWebsite);
          } else {
            // Empty
            displayErrorMessage($('.js-new-property_website'), 'Error: Website cannot be empty.');
          }
        });


        // ===== PHONE NUMBER =====
        $('.js-new-property_phone-number').bind('keydown input', (e) => {

          if (e.keyCode !== 8) {
            let number = e.target.value.replace(/\D/g,'');
            let dashedNumber;

            if (number.length > 2) {
              dashedNumber = number.substring(0, 3) + '-';
              if (number.length === 4 || number.length === 5) {
                dashedNumber += number.substr(3);
              } else if (number.length > 5) {
                dashedNumber += number.substring(3, 6) + '-';
              }
              if (number.length > 6) {
                dashedNumber += number.substring(6);
              }
            } else {
              dashedNumber = number;
            }

            $('.js-new-property_phone-number').val(dashedNumber);
          }
        });

        $('.js-new-property_phone-number').bind('input focusout', (e) => {
          let newPhoneNumber = e.target.value;

          $('.js-new-property_phone-number').val((newPhoneNumber.length > 12) ? newPhoneNumber.slice(0, -1) : newPhoneNumber);

          newPhoneNumber = $('.js-new-property_phone-number').val();

          // Tests
          let isEmpty = newPhoneNumber === '';
          let isValidPhoneNumber = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/.test(newPhoneNumber);

          if (isValidPhoneNumber && !isEmpty) {
            // Valid Phone Number
            displaySuccess($('.js-new-property_phone-number'));
            $('.js-preview-data_phone-number').text(newPhoneNumber);
          } else if (!isValidPhoneNumber && !isEmpty){
            // Invalid Phone Number
            displayErrorMessage($('.js-new-property_phone-number'), 'Error: Phone Number is invalid.');
          } else {
            // Empty
            displayErrorMessage($('.js-new-property_phone-number'), 'Error: Phone Number cannot be empty.');
          }
        });



        // ===== EMAIL ADDRESS =====
        $('.js-new-property_email-address').bind('input focusout', (e) => {
          let newEmailAddress = e.target.value;

          // Tests
          let isEmpty = newEmailAddress === '';
          let isValidEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(newEmailAddress);

          if (isValidEmail && !isEmpty) {
            // Not Empty
            displaySuccess($('.js-new-property_email-address'));
            $('.js-preview-data_email-address').text(newEmailAddress);
          } else if (!isValidEmail && !isEmpty) {
            // Invalid Email Address
            displayErrorMessage($('.js-new-property_email-address'), 'Error: Email Address is invalid.');
          } else {
            // Empty
            displayErrorMessage($('.js-new-property_email-address'), 'Error: Email Address cannot be empty.');
          }
        });

        // ===== TOOLTIP =====
        $('.js-error-image').bind('mouseover mouseout', (e) => {
          $(e.target).closest('.error-tooltip').find('.js-error-message').css('visibility', e.type === 'mouseover' ? 'visible' : 'hidden');
        });



        // Sticky Top for the display
        $(window).scroll(function () {
            if( $('.display').offset().top - $(window).scrollTop() < 50) {
                if ($('.display').offset().top - $(window).scrollTop() > 50) {
                    $('.js-display-listing').offset({top: $('.display').offset().top + 25});
                } else {
                    $('.js-display-listing').offset({top: $(window).scrollTop() + 50});
                }
            }
        });

        // Update Property Name
        $('.js-new-property_name').on('input', (e) => {
            if($(e.target).val() == '') {
                $('.js-display_property-name').text('{Property Name}');
            } else {
                $('.js-display_property-name').text($(e.target).val());
            }
        });

        $('.js-new-property_address, .js-new-property_city, .js-dropdown-button').on('input focusout', () => {

            // Address Input
            let propertyAddress = $('.js-new-property_address').val() == '' ? '{Property Addresss}' : $('.js-new-property_address').val();

            // City Input
            let propertyCity = $('.js-new-property_city').val() == '' ? '{Property City}' : $('.js-new-property_city').val();

            // State Input
            let propertyState = $('.js-new-property_state').val() == '' ? '{Property State}' : $('.js-new-property_state').val();

            $('.js-display_property-address').text(`${propertyAddress}, ${propertyCity}, ${propertyState}`);

        });

        var activeSlide = 0;
        var prevSlide = -1;
        displaySlide(activeSlide, prevSlide);

        $('.js-slide_back').bind('click', (e) => {
          activeSlide -= 1;
          displaySlide(activeSlide, activeSlide + 1);
        })

        $('.js-slide_next').bind('click', (e) => {
          activeSlide += 1;
          displaySlide(activeSlide, activeSlide - 1);
        })

        function displaySlide(activeIndex, prevIndex) {

          var SLIDE_MAX = 5;

          if (activeIndex === SLIDE_MAX) {
            activeSlide = 0;
          }

          if (activeIndex === -1) {
            activeSlide = SLIDE_MAX - 1;
          }

          $('.slide-form').each((index, element) => {
            if (activeSlide !== index) {
              $(element).hide();
            } else {
              $(element).show();
            }
          });

          $('.slide-pagnation').each((index, element) => {
            if (activeSlide === index) {
              $(element).addClass('slide-pagnation-active');
            } else {
              $(element).removeClass('slide-pagnation-active')
            }

            if (prevIndex === index) {
              $(element).addClass('slide-pagnation-filled');

              let numberErrors = $('.slide-form').eq(index).find('.error').length;
              let numberSuccess = $('.slide-form').eq(index).find('.success').length;

              // Test
              let isFilled = false;

              switch (index) {
                case 0:
                  isFilled = numberSuccess === 2;
                  break;
                case 1:
                  isFilled = numberSuccess >= 6;
                  break;
                case 2:
                  isFilled = numberSuccess >= 2;
                  break;
                case 3:
                  isFilled = numberSuccess > -1;
                  break;
                case 4:
                  isFilled = numberSuccess === 3;
                  break;
              }

              if (numberErrors > 0 || !isFilled) {
                $(element).find('.js-success-image').hide();
                $(element).find('.js-error-image').show();
              } else if (isFilled) {
                $(element).find('.js-error-image').hide();
                $(element).find('.js-success-image').show();
              }
            }
          })
        }

        $('.slide-pagnation').bind('click', (e) => {

          $('.slide-form').each((index, element) => {

            let targetElement = $(e.target).closest('.slide-pagnation').get(0);
            let testElement = $('.slide-pagnation').eq(index).get(0);

            if(targetElement === testElement) {
              let prevSlide = activeSlide;
              activeSlide = index;
              displaySlide(index, prevSlide);
            }
          })
        })

        $('.js-modal-open').bind('click', (e) => {
          $('.js-modal').fadeIn(100);
        })

        $('.js-modal-close').bind('click', (e) => {
          $('.js-modal').fadeOut(100);
        })

        // ===== SUBMIT =====
        $('.js-submit-data').bind('click', (e) => {
          var formData = $('form').serializeArray()

          formData = formData.concat(
            $('form input[type=checkbox]:not(:checked)').map((index, element) => {
              return {'name': element.name, 'value': 'off'}
            }).get()
          );

          console.log($.param(formData));

          if ($.param(formData).indexOf('=&') > -1) {
            // Form has an empty value
            console.log('Not Submitted');
          } else {
            // Form does not have an empty value
            $.ajax({
              type: 'POST',
              url: 'http://127.0.0.1/wp/wp-json/api/v2/append',
              data: $.param(formData),
              success: (data) => {
                alert(data);
              }
            })

            console.log('Submitted');
          }
        })
    })
</script>
