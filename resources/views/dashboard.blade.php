@extends("layouts.main")

@php
$pages = ceil($totalPets / 10);
$arrayOfPages = [];

for ($i = 1; $i <= $pages; $i++) {
    array_push($arrayOfPages, $i);
}

@endphp

@section('content')
  <div id="dashboard-page">
    <x-header />
    <div class="content">
      <header class="header">
        <span>
          List of registered pets ({{ $totalPets }})
        </span>
        <a href="{{ route('pets.new') }}" class="new-pet-button">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" color="#fff" height="18"
            width="18" xmlns="http://www.w3.org/2000/svg" style="color: rgb(255, 255, 255);">
            <path
              d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
            </path>
          </svg>
          New pet
        </a>
      </header>
      <span class="actual-page">
        Page {{ $selectedPage }} - Showing {{ $petsLength }} of {{ $totalPets }} entries.
      </span>

      <div class="table-wrapper">
        <table class="table">
          <thead>
            <tr>
              <th>
                <x-checkbox name="select-all" />
              </th>
              <th>Name</th>
              <th>Age</th>
              <th>Type</th>
              <th>Breed</th>
              <th>Owner</th>
              <th>Owner's contact</th>
              <th>
                <button class="table-button invisible" data-tippy-content="Delete all selected pets"
                  id="delete-all-button">
                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" color="#F50057"
                    height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(245, 0, 87);">
                    <path
                      d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z">
                    </path>
                  </svg>
                </button>
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pets as $pet)
              <tr data-key="{{ $pet->id }}">
                <td>
                  <x-checkbox name="pet-item-{{ $pet->id }}" />
                </td>
                <td>
                  {{ $pet->name }}
                </td>
                <td>
                  {{ $pet->age }} year{{ $pet->age != 1 ? 's' : '' }}
                </td>
                <td>
                  {{ $pet->type == 'dog' ? 'Dog' : 'Cat' }}
                </td>
                <td>
                  {{ $pet->breed }}
                </td>
                <td>
                  {{ $pet->ownerName }}
                </td>
                <td>
                  {{ $pet->ownerContact }}
                </td>
                <td>
                  <button class="table-button invisible" data-tippy-content="Delete {{ $pet->name }}"
                    data-action="delete">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" color="#F50057"
                      height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(245, 0, 87);">
                      <path
                        d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z">
                      </path>
                    </svg>
                  </button>
                </td>
                <td>
                  <a class="table-button" href="{{ route('pets.update/{id}', ['id' => $pet->id]) }}"
                    data-tippy-content="Update {{ $pet->name }}">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" color="#F50057"
                      height="20" width="20" xmlns="http://www.w3.org/2000/svg" style="color: rgb(245, 0, 87);">
                      <path
                        d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z">
                      </path>
                    </svg>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="pagination">
        @foreach ($arrayOfPages as $page)
          <a href="?page={{ $page }}" class="pagination-item {{ $page == $selectedPage ? 'active' : '' }}">
            {{ $page }}
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    let selectAll = false;
    let selectedItems = [];

    const notyf = new Notyf({
      duration: 5000,
      dismissible: true,
      position: {
        x: "right",
        y: "top",
      },
      types: [{
        type: "info",
        background: "linear-gradient(45deg, rgb(239, 253, 33), rgb(255, 0, 0))",
      }, ],
    });

    function fetchDeleteItem(id) {
      fetch(`api/pet/${id}`, {
          method: "DELETE",
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            notyf.error(data.message);
          } else {
            notyf.success(data.message);

            selectedItems.filter((item) => item !== id);

            onChange();
            onDelete(id);
          }
        });
    }

    function onDelete(id) {
      const cell = document.querySelector(`[data-key="${id}"]`);

      cell.remove();
    }

    function onChange() {
      const deleteAllButton = document.querySelector("#delete-all-button");

      document.querySelectorAll("[data-key]").forEach((cell) => {
        const key = cell.getAttribute("data-key");
        const checkbox = document.querySelector(`#checkbox-pet-item-${key}`);
        const checkboxInput = document.querySelector(
          `#checkbox-pet-item-${key} input`
        );
        const deleteButton = document.querySelector(
          `[data-key="${key}"] .table-button`
        );

        if (selectedItems.includes(key)) {
          cell.classList.add("active");
          checkbox.classList.add("active");
          checkboxInput.checked = true;
          deleteButton.className = "table-button visible";
          deleteAllButton.className = "table-button visible";
        } else {
          cell.classList.remove("active");
          checkbox.classList.remove("active");
          checkboxInput.checked = false;
          deleteButton.className = "table-button invisible";
        }
      });

      if (selectedItems.length === 0) {
        deleteAllButton.className = "table-button invisible";
      }
    }

    function toggleSelectAllCheckbox() {
      if (!selectAll) {
        document.querySelectorAll("[data-key]").forEach((cell) => {
          const key = cell.getAttribute("data-key");

          selectedItems.push(key);
        });
      } else {
        selectedItems = [];
      }

      onChange();

      selectAll = !selectAll;
    }

    function toggleSelectCheckbox(id) {
      const replacedId = id.replace("checkbox-pet-item-", "");
      if (selectedItems.includes(replacedId)) {
        selectedItems = selectedItems.filter((item) => item !== replacedId);
      } else {
        selectedItems.push(replacedId);
      }

      onChange();
    }

    function deleteAllSelectedItems() {
      selectedItems.forEach((item) => {
        fetchDeleteItem(item);
      });

      notyf.open({
        type: "info",
        message: "Please, reload the page.",
      });
    }

    window.addEventListener("load", () => {
      document
        .querySelector("#checkbox-select-all")
        .addEventListener("click", toggleSelectAllCheckbox);

      document.querySelectorAll("[data-key]").forEach((cell) => {
        const key = cell.getAttribute("data-key");
        const deleteButton = document.querySelector(
          `[data-key="${key}"] [data-action="delete"]`
        );

        cell.addEventListener("click", () => {
          toggleSelectCheckbox(key);
        });

        deleteButton.addEventListener("click", () => {
          fetchDeleteItem(key);
        });
      });

      document
        .querySelector("#delete-all-button")
        .addEventListener("click", deleteAllSelectedItems);
    });

  </script>
@endsection
