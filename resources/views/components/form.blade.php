<form class="form-container">
  <div class="form-content">
    <div class="form">
      <h2 class="heading">
        Pet data
      </h2>

      <div class="input-group">
        <label for="name">
          Name
        </label>
        <input class="pet-name-input" name="name" id="name" placeholder="Ex: Bob, Bailey, Bella..." tabindex="1" />
      </div>

      <div class="input-group">
        <label for="breed">
          Breed
        </label>
        <input class="pet-breed-input" name="breed" id="breed" placeholder="Ex: German Shepherd, French Bulldog..."
          tabindex="2" />
      </div>

      <div class="input-group">
        <label for="age" style="display: flex; align-items: center;">
          Age <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" color="#fff"
            data-tippy-content="Age in years. If it is not 1 (one) full year old, fill it as 0 (zero)." height="20"
            width="20" xmlns="http://www.w3.org/2000/svg" currentItem="false"
            style="color: rgb(255, 255, 255); margin-left: 12px;">
            <path
              d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z">
            </path>
          </svg>
        </label>
        <input class="pet-age-input" name="age" id="age" placeholder="Age in years" tabindex="3" />
      </div>

      <div class="input-group">
        <label for="type">Type</label>
        <select name="type" placeholder="Cat or dog?" class="pet-type-input" tabindex="4">
          <option value="" disabled selected>
            Cat or dog?
          </option>
          <option value="cat">Cat</option>
          <option value="dog">Dog</option>
        </select>
      </div>
    </div>
    <div class="form">
      <h2 class="heading">
        Owner data
      </h2>
      <div class="input-group">
        <label for="owner-name">
          Name
        </label>
        <input class="owner-name-input" name="owner-name" id="owner-name" placeholder="Ex: John, Alex, Cindy..."
          tabindex="5" />
      </div>
      <div class="input-group">
        <label for="owner-contact">
          Contact
        </label>
        <input class="owner-contact-input" name="owner-contact" id="owner-contact" placeholder="Ex: (555) 555-1234"
          tabindex="6" />
      </div>
    </div>
  </div>
  <div class="row-buttons">
    <a href="{{ route('dashboard') }}" class="base-button back-button" tabindex="9">
      Back
    </a>
    <div class="button-group">
      <button type="button" class="base-button clear-button" tabindex="8">
        Clear
      </button>
      <button type="submit" class="base-button save-button" tabindex="7">
        Save
      </button>
    </div>
  </div>
</form>
