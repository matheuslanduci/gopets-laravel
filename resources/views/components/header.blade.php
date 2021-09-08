<header id="header">
  <img src={{ asset('assets/goPets.png') }} alt="goPets" />
  <nav class="nav">
    <a href="{{ route("dashboard") }}" class="nav-item active">
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" color="#fff" height="24"
        width="24" xmlns="http://www.w3.org/2000/svg" style="color: rgb(255, 255, 255);">
        <circle cx="4.5" cy="9.5" r="2.5"></circle>
        <circle cx="9" cy="5.5" r="2.5"></circle>
        <circle cx="15" cy="5.5" r="2.5"></circle>
        <circle cx="19.5" cy="9.5" r="2.5"></circle>
        <path
          d="M17.34 14.86c-.87-1.02-1.6-1.89-2.48-2.91-.46-.54-1.05-1.08-1.75-1.32-.11-.04-.22-.07-.33-.09-.25-.04-.52-.04-.78-.04s-.53 0-.79.05c-.11.02-.22.05-.33.09-.7.24-1.28.78-1.75 1.32-.87 1.02-1.6 1.89-2.48 2.91-1.31 1.31-2.92 2.76-2.62 4.79.29 1.02 1.02 2.03 2.33 2.32.73.15 3.06-.44 5.54-.44h.18c2.48 0 4.81.58 5.54.44 1.31-.29 2.04-1.31 2.33-2.32.31-2.04-1.3-3.49-2.61-4.8z">
        </path>
      </svg>
      Pets
    </a>
    <a to="#" class="nav-item inactive" data-tippy-content="Soon...">
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" color="#fff" height="24"
        width="24" xmlns="http://www.w3.org/2000/svg" style="color: rgb(255, 255, 255);">
        <path
          d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z">
        </path>
      </svg>
      Users
    </a>
  </nav>

  <a href="{{ route("home") }}" class="logout">
    Logout
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" color="#fff" height="24"
      width="24" xmlns="http://www.w3.org/2000/svg" style="color: rgb(255, 255, 255);">
      <g>
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path
          d="M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z">
        </path>
      </g>
    </svg>
  </a>
</header>
