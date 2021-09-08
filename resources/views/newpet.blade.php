@extends("layouts.main")

@section('content')
  <div id="new-pet-page">
    <x-header />
    <h1>Register new pet</h1>
    <x-form />
  </div>
@endsection

@section('scripts')
  <script>
    const notyf = new Notyf({
      duration: 5000,
      dismissible: true,
      position: {
        x: "right",
        y: "top",
      }
    });

    function handleFocusOnAgeInput() {
      const input = document.querySelector("input[name=age]");

      input.type = "number";
      input.min = "0";

      if (input.value < 0) {
        input.value = 0;
      }
    }

    function handleBlurOnAgeInput() {
      const input = document.querySelector("input[name=age]");

      input.type = "text";

      if (input.value < 0) {
        input.value = "";
      }
    }

    function handleSubmit(ev) {
      ev.preventDefault();

      const petName = document.querySelector("input[name=name]").value,
        petAge = document.querySelector("input[name=age]").value,
        petBreed = document.querySelector("input[name=breed]").value,
        petType = document.querySelector("select[name=type]").value,
        ownerName = document.querySelector("input[name='owner-name']").value,
        ownerContact = document.querySelector("input[name='owner-contact']").value;

      fetch("../api/pets", {
        method: "POST",
        headers: {
          "Accept": "application/json"
        },
        body: JSON.stringify({
          name: petName,
          breed: petBreed,
          type: petType,
          age: petAge,
          owner: {
            name: ownerName,
            contact: ownerContact
          }
        })
      }).then(response => response.json()).then(data => {
        if (data.error || data.errors) {
          notyf.error(data.message);
        } else {
          notyf.success(data.message);

          handleClear();

          document.querySelector("input[name=name]").focus();
        }
      })
    }

    function handleClear() {
      document.querySelector("input[name=name]").value = "";
      document.querySelector("input[name=age]").value = "";
      document.querySelector("input[name=breed]").value = "";
      document.querySelector("select[name=type]").value = "";
      document.querySelector("input[name='owner-name']").value = "";
      document.querySelector("input[name='owner-contact']").value = "";
    }

    window.addEventListener("load", () => {
      document.querySelector("input[name=age]").addEventListener("focus", handleFocusOnAgeInput);
      document.querySelector("input[name=age]").addEventListener("blur", handleBlurOnAgeInput);
      document.querySelector("form").addEventListener("submit", handleSubmit);
      document.querySelector(".clear-button").addEventListener("click", handleClear);
    });

  </script>
@endsection
