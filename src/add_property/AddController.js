class AddController {
  constructor(Model, View) {
    // Initialize event listenters
    this.addEventListener();

    this.Model = Model;
    this.View = View;

    this.activeSlide = 0;
    this.prevSlide = -1;
    this.displaySlide(this.activeSlide, this.prevSlide);
  }

  /**
   * Function that checks if a given elements value is empty. 
   * 
   * Raises an error on the given element if it is empty. 
   * @param {Object} element 
   */
  isEmpty(element) {
    let inputValue = element.val().trim(); // Remove any padded whitespace characters
    let elementName = element.attr('name').replace(/\-/g, ' ').split(' ').map((word) => word.length === 2 ? word[0].toUpperCase() + word[1].toUpperCase() : word[0].toUpperCase() + word.substring(1)).join(' ');

    if ('' === inputValue || undefined === inputValue) {
      // The input value has no value
      this.View.displayErrorMessage(element, `${elementName} cannot be empty.`);

      return true;
    }

    return false;

  }

  /**
   * Function that checks if a given element has any errors
   * 
   * If no error are found then display the success message
   * @param {Object} element 
   */
  hasErrors(element) {
    return $(element).hasClass('error');
  }

  displaySlide(activeIndex, prevIndex) {

    var SLIDE_MAX = 5;

    if (activeIndex === SLIDE_MAX) {
      this.activeSlide = 0;
    }

    if (activeIndex === -1) {
      this.activeSlide = SLIDE_MAX - 1;
    }

    $('.slide-form').each((index, element) => {
      if (this.activeSlide !== index) {
        $(element).hide();
      } else {
        $(element).show();
      }
    });

    $('.slide-pagnation').each((index, element) => {
      if (this.activeSlide === index) {
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

  /**
   * Function that adds listeners for validation, form control, or functionality
   */
  addEventListener() {

    // Add a empty value form validataion on all text input
    $('input.js-text-input').bind('focusout input', (e) => {
      if (!this.isEmpty($(e.target)) || ($(e.target).hasClass('error') && !this.isEmpty($(e.target)))) {
        this.View.displaySuccess($(e.target));
      }
    });

    // Add validation and functionality to dropdown inputs
    $('input.js-dropdown-input, button.js-dropdown-button').bind('click focusout', (e) => {
      this.View.toggleDropdown(e);

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
          this.View.displaySuccess(dropdownWrapper);
          $(`.js-preview-data_${dropdownWrapper.attr('id')}`).text(newDropdownValue);
        } else {
          this.View.displayErrorMessage(dropdownWrapper, `Error: <b>${dropdownName}</b> cannot be empty.`);
        }
      }
    });

    $('.js-new-property_dropdown-item').bind('mousedown', (e) => {
      this.View.dropdownContentSelect(e);
    });

    // Custom validation on the ID input
    $('input.js-new-property_id').bind('input focusout', (e) => {

      // Get the input value for ID
      let newID = e.target.value;

      // Tests
      let isEmpty = this.isEmpty($(e.target));
      let isNumber = /^\d+$/.test(newID);
      let isGreaterThanThreeDigits = newID > 99;
      let isExistingID = false;

      if (!isNumber && !isEmpty) {
        // Contains Non-numeric Values
        this.View.displayErrorMessage($('.js-new-property_id'), 'ID must contain only numeric values.');

      } else if (isNumber && !isEmpty) {
        if (isGreaterThanThreeDigits) {
          this.Model.getPropertyIDs().then((response) => {

            // Check if the ID already exists 
            isExistingID = response.includes(newID);

            if (isExistingID) {
              // ID Already Exists
              this.View.displayErrorMessage($('.js-new-property_id'), 'ID Already Exists.');
            } else {
              // Valid New ID
              this.View.displaySuccess($('.js-new-property_id'));
              $('.js-preview-data_id').text(newID);
            }
          });
        } else {
          // ID Not Large Enough
          this.View.displayErrorMessage($('.js-new-property_id'), 'ID must be greater than 99.');
        }
      }

    });

    // Custom validation on the Zipcode input
    $('input.js-new-property_zipcode').bind('input focusout', (e) => {

      // Get the input value for the zipcode
      let newZipcode = e.target.value;

      // Tests
      let isEmpty = this.isEmpty($(e.target));
      let isValidZipcode = /(^\d{5}$)|(^\d{5}-\d{4}$)/.test(newZipcode);

      if (isValidZipcode && !isEmpty) {
        // Valid Zipcode
        this.View.displaySuccess($('.js-new-property_zipcode'));
        $('.js-preview-data_zipcode').text(newZipcode);
      } else if (!isValidZipcode && !isEmpty) {
        // Invalid Zipcode
        this.View.displayErrorMessage($('.js-new-property_zipcode'), 'Error: Invalid format.')
      }

    });

    // Custom validation to Sister Property ID input
    $('input.js-new-sister-property_id').bind('input focusout', (e) => {

      let newSisterID = e.target.value;

      // Tests
      let isNumber = /^\d+$/.test(newSisterID);
      let isEmpty = newSisterID === '';
      let isGreaterThanThreeDigits = newSisterID > 99;

      if (!isNumber && !isEmpty) {
        // Contains Non-numeric Values
        this.View.displayErrorMessage($('.js-new-sister-property_id'), 'Error: ID must contain only numeric values.');

      } else if (!isEmpty) {
        if (isGreaterThanThreeDigits) {
          this.Model.getPropertyIDs().then((response) => {

            // Tests
            let isValidID = response.includes(newSisterID);

            if (isValidID) {
              // ID Exists
              this.View.displaySuccess($('.js-new-sister-property_id'));
              $('.js-preview-data_sister-property_id').text(newSisterID);

              this.Model.getPropertyNameFromID(newSisterID).then((response) => {
                $('.js-sister-property-lookup').val(`${response[0].ID}: ${response[0].NAME}`);
              })

            } else {
              // ID Does Not Exist
              this.View.displayErrorMessage($('.js-new-sister-property_id'), 'Error: ID Does Not Exist.');
              $('.js-sister-property-lookup').val('');
            }
          });

        } else {
          // ID Not Large Enough
          this.View.displayErrorMessage($('.js-new-sister-property_id'), 'Error: Invalid ID. Must be greater than 99.');
          $('.js-sister-property-lookup').val('');
        }
      } else {
        // ID Empty
        this.View.displayErrorMessage($('.js-new-sister-property_id'), 'Error: ID cannot be empty.');
        $('.js-sister-property-lookup').val('');
      }
    });

    // Add switch functionality to Sister Property input
    $('input.js-new-sister-property').change((e) => {
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

    // Add switch functionality to Tag input
    $('input.js-new-property-tags').change((e) => {
      $('.js-new-property-tags').each((index, element) => {
        $(`.js-preview-data_tag${index + 1}`).text(element.checked);
      })
    })

    // Add form validation to the Phone Number input
    $('input.js-new-property_phone-number').bind('keydown input', (e) => {

      if (e.keyCode !== 8) {
        let number = e.target.value.replace(/\D/g, '');
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
    $('input.js-new-property_phone-number').bind('input focusout', (e) => {
      let newPhoneNumber = e.target.value;

      $('.js-new-property_phone-number').val((newPhoneNumber.length > 12) ? newPhoneNumber.slice(0, -1) : newPhoneNumber);

      newPhoneNumber = $('.js-new-property_phone-number').val();

      // Tests
      let isEmpty = newPhoneNumber === '';
      let isValidPhoneNumber = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/.test(newPhoneNumber);

      if (isValidPhoneNumber && !isEmpty) {
        // Valid Phone Number
        this.View.displaySuccess($('.js-new-property_phone-number'));
        $('.js-preview-data_phone-number').text(newPhoneNumber);
      } else if (!isValidPhoneNumber && !isEmpty) {
        // Invalid Phone Number
        this.View.displayErrorMessage($('.js-new-property_phone-number'), 'Error: Phone Number is invalid.');
      }
    });

    // Add form validation to the Email input
    $('input.js-new-property_email-address').bind('input focusout', (e) => {
      let newEmailAddress = e.target.value;

      // Tests
      let isEmpty = newEmailAddress === '';
      let isValidEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(newEmailAddress);

      if (isValidEmail && !isEmpty) {
        // Not Empty
        this.View.displaySuccess($('.js-new-property_email-address'));
        $('.js-preview-data_email-address').text(newEmailAddress);
      } else if (!isValidEmail && !isEmpty) {
        // Invalid Email Address
        this.View.displayErrorMessage($('.js-new-property_email-address'), 'Error: Email Address is invalid.');
      }
    });

    // Add button functionality to position finder button
    $('.js-new-property_lat_lon_button').bind('click', (e) => {
      let errorMessage = '';

      let enteredAddress = $('.js-new-property_address').val();
      // Address Test
      let addressEmpty = enteredAddress === '';

      if (addressEmpty) {
        errorMessage += '<br/>&emsp;&bull;&nbsp;Address cannot be empty.';
        this.View.displayErrorMessage($('.js-new-property_address'), 'Address cannot be empty.');
      }

      let enteredCity = $('.js-new-property_city').val();
      // City Test
      let cityEmpty = enteredCity === '';

      if (cityEmpty) {
        errorMessage += '<br/>&emsp;&bull;&nbsp;City cannot be empty.';
        this.View.displayErrorMessage($('.js-new-property_city'), 'City cannot be empty.');
      }

      let enteredState = $('.js-new-property_state').val();
      // State Test
      let stateEmpty = enteredState === '' || enteredState === undefined;

      if (stateEmpty) {
        errorMessage += '<br/>&emsp;&bull;&nbsp;State cannot be empty.';
        this.View.displayErrorMessage($('.js-new-property_state').closest('.js-dropdown-wrapper'), 'State cannot be empty.');

        let dropdownInput = $('.js-new-property_state').closest('.js-dropdown-wrapper').find('.js-dropdown-input');
        let dropdownButton = $('.js-new-property_state').closest('.js-dropdown-wrapper').find('.js-dropdown-button');

        dropdownInput.css('border', '0px');
        dropdownButton.css('border', '0px');
      }

      let enteredZipcode = $('.js-new-property_zipcode').val();
      // Zipcode Test
      let zipcodeEmpty = enteredZipcode === '';
      let isValidZipcode = /(^\d{5}$)|(^\d{5}-\d{4}$)/.test(enteredZipcode);

      if (!isValidZipcode && !zipcodeEmpty) {
        errorMessage += '<br/>&emsp;&bull;&nbsp;Invalid Zipcode format.';
        this.View.displayErrorMessage($('.js-new-property_zipcode'), 'Zipcode format is invalid.</br>Use formats 12345 or 12345-6789')
      } else if (zipcodeEmpty) {
        errorMessage += '<br/>&emsp;&bull;&nbsp;Zipcode cannot be empty.';
        this.View.displayErrorMessage($('.js-new-property_zipcode'), 'Zipcode cannot be empty.')
      }

      if (errorMessage === '') {
        let accessKey = '3b125cea3d1d33d544f0d76717a8c6dd';
        let query = encodeURI(`${enteredAddress} ${enteredState}, ${enteredCity}, ${enteredZipcode}`);
        let endpoint = `http://api.positionstack.com/v1/forward?access_key=${accessKey}&query=${query}`;

        this.View.displayLoading($('.js-new-property_lat_lon_button'));


        fetch(endpoint).then((response) => {
          return response.json()
        }).then((response) => {
          $('.js-new-property_latitude').val(response.data[0].latitude);
          $('.js-new-property_longitude').val(response.data[0].longitude);

          this.View.displaySuccess($('.js-new-property_longitude'))
          this.View.displaySuccess($('.js-new-property_latitude'));
          this.View.displaySuccess($('.js-new-property_lat_lon_button'));

          $('.js-preview-data_latitude').text(response.data[0].latitude);
          $('.js-preview-data_longitude').text(response.data[0].longitude);
        });
      } else {
        this.View.displayErrorMessage($('.js-new-property_lat_lon_button'), errorMessage.slice(5))
      }
    });

    // Add hover and input listener to the error message tooltip
    $('.js-error-image, .js-text-input, .js-dropdown-input, .js-format-text-input').bind('mouseover mouseout input focusout', (e) => {
      $(e.target).parents('[class*=group-item]').find('.error-tooltip').find('.js-error-message').css('visibility', e.type === 'mouseover' || e.type === 'input' ? 'visible' : 'hidden');
    });

    // Add listener to the display preview
    $('.js-new-property_name').on('input', (e) => {
      // Check if the name value is empty
      if ($(e.target).val() == '') {
        // Default name
        $('.js-display_property-name').text('P. Sherman');
      } else {
        // Set the name value to the input value
        $('.js-display_property-name').text($(e.target).val());
      }
    });
    $('.js-new-property_address, .js-new-property_city, .js-dropdown-button').on('input focusout', () => {

      // Address Input
      let propertyAddress = $('.js-new-property_address').val() == '' ? '42 Wallaby Way' : $('.js-new-property_address').val();

      // City Input
      let propertyCity = $('.js-new-property_city').val() == '' ? 'Sydney' : $('.js-new-property_city').val();

      // State Input
      let propertyState = $('.js-new-property_state').val() == '' ? 'NSW' : $('.js-new-property_state').val();

      $('.js-display_property-address').text(`${propertyAddress}, ${propertyCity}, ${propertyState}`);

    });

    // Add functionality to the next and prev slide buttons
    $('.js-slide_back').bind('click', (e) => {
      this.activeSlide -= 1;
      this.displaySlide(this.activeSlide, this.activeSlide + 1);
    })

    $('.js-slide_next').bind('click', (e) => {
      this.activeSlide += 1;
      this.displaySlide(this.activeSlide, this.activeSlide - 1);
    })

    // Add functionality to the pagnation 
    $('.slide-pagnation').bind('click', (e) => {

      $('.slide-form').each((index, element) => {

        let targetElement = $(e.target).closest('.slide-pagnation').get(0);
        let testElement = $('.slide-pagnation').eq(index).get(0);

        if (targetElement === testElement) {
          let prevSlide = this.activeSlide;
          this.activeSlide = index;
          this.displaySlide(index, prevSlide);
        }
      })
    })

    // Add functionality to the Preview Data Button
    $('.js-preview-modal-open').bind('click', (e) => {
      var formData = $('form').serializeArray()

      formData = formData.concat(
        $('form input[type=checkbox]:not(:checked)').map((index, element) => {
          return {
            'name': element.name,
            'value': 'off'
          }
        }).get()
      );

      formData.forEach((object, index) => {
        let propertyName = object.name.replace("property-", "")
        $(`.js-preview-data_${propertyName}`).text(object.value);
      });

      console.log(formData);

      $('.js-preview-modal').fadeIn(100);
    })

    $('.js-modal-close').bind('click', (e) => {
      $('.js-modal').fadeOut(100);
    })

    // Add functionality to the Submit button
    $('.js-submit-data').bind('click', (e) => {
      var formData = $('form').serializeArray()

      formData = formData.concat(
        $('form input[type=checkbox]:not(:checked)').map((index, element) => {
          return {
            'name': element.name,
            'value': 'off'
          }
        }).get()
      );


      if ($.param(formData).indexOf('=&') > -1) {
        // Form has an empty value
        console.log('Not Submitted');
        $('.js-submit-unsuccessful-modal').fadeIn(100);
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
  }
}