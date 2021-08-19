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

    .inputGroup input[type="text"],
    .inputGroup select {
        width: 100%;
    }

    div.inputGroup {
        margin-top: 1rem;
    }


    #displayListing {
        margin: 1rem auto;
        box-shadow: #aeaeae 10px 10px 10px;
        border: 2px solid #efefef;
    }
</style>

<div class="newPropertyForm">
    <div class="input">
        <form action="http://127.0.0.1/wp/wp-json/api/v2/append" method="POST">

            <div class="slide-form" id='slide_1'>
                <h5 class="inputSectionTitle">Property Identifiers</h5>
                <hr>
                <div class="inputGroup">
                    <h5>ID</h5>
                    <input type="text" name="propertyID" id="propertyID">
                </div>

                <div class="inputGroup">
                    <h5>Name</h5>
                    <input type="text" name="propertyName" id="js-property-name">
                </div>
            </div>

            <div class="slide-form" id="slide_2">

            </div>

            <h5 class="inputSectionTitle">Address</h5>
            <hr>
            <div class="inputGroup">
                <h5>Address</h5>
                <input type="text" name="propertyAddress" id="propertyAddress">
            </div>

            <div class="inputGroup">
                <h5>City</h5>
                <input type="text" name="propertyCity" id="propertyCity">
            </div>

            <div class="inputGroup">
                <h5>State</h5>
                <select name="propertyState" id="propertyState">
                    <option value="default">Select State</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>

            <div class="inputGroup">
                <h5>Zipcode</h5>
                <input type="text" name="propertyZipcode" id="propertyZipcode">
            </div>


            <h5 class="inputSectionTitle">Position</h5>
            <hr>

            <div class="inputGroup">
                <h5>Latitude</h5>
                <input type="text" name="propertyLAT" id="propertyLAT">
            </div>

            <div class="inputGroup">
                <h5>Longitude</h5>
                <input type="text" name="propertyLON" id="propertyLON">
            </div>



            <h5 class="inputSectionTitle">Property Attributes</h5>
            <hr>
            <div class="inputGroup">
                <h5>Housing Type</h5>
                <select name="propertyHousingType" id="propertyHousingType">
                    <option value="default">Select Housing Type</option>
                    <option value="family">Family</option>
                    <option value="senior">Senior</option>
                    <option value="student">Student</option>
                </select>
            </div>

            <div class="inputGroup">
                <h5>Affordability</h5>
                <select name="propertyAffordability" id="propertyAffordability">
                    <option value="default">Select Affordability</option>
                    <option value="affordable">Affordable</option>
                    <option value="luxury">Luxury</option>
                    <option value="marketRate">Market Rate</option>
                    <option value="marketRateAffordable">Market Rate & Affordable</option>
                </select>
            </div>

            <div class="inputGroup">
                <h5>Sister Property</h5>
                <label for="propertyHasSisterProperty">Sister Property</label>
                <input type="checkbox" name="propertyHasSisterProperty" id="propertyHasSisterProperty">
            </div>

            <div class="inputGroup">
                <h5>Sister Property ID</h5>
                <input type="text" name="propertySisterPropertyID" id="propertySisterPropertyID">
            </div>

            <div class="inputGroup">
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
            </div>

            <h5 class="inputSectionTitle">Media</h5>
            <hr>
            <div class="inputGroup">
                <h5>Website</h5>
                <input type="text" name="propertyWebsite" id="propertyWebsite">
            </div>

            <div class="inputGroup">
                <h5>Phone Number</h5>
                <input type="text" name="propertyPhoneNumber" id="propertyPhoneNumber">
            </div>

            <div class="inputGroup">
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

        // Get List of ID's already in use



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
