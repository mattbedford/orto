<template>
    <div>
      <input
        @change="toggleTheme"
        id="checkbox"
        type="checkbox"
        class="switch-checkbox"
      />
      <label for="checkbox" class="switch-label">
        <span v-if="userTheme === 'light-theme'"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 122.56 122.88"><path fill-rule="evenodd" d="M121.85 87.3A64.31 64.31 0 1 1 36.88.4c2.94-1.37 5.92.91 4.47 4.47a56.29 56.29 0 0 0 75.75 77.4l.49-.27a3.41 3.41 0 0 1 4.61 4.61l-.35.69ZM92.46 74.67H92a16.11 16.11 0 0 0-15.8-15.74v-.52a15.08 15.08 0 0 0 11-4.72 15.19 15.19 0 0 0 4.72-11h.51a15.12 15.12 0 0 0 4.72 11 15.12 15.12 0 0 0 11 4.72v.51a16.13 16.13 0 0 0-15.69 15.75Zm10.09-46.59h-.27a7.94 7.94 0 0 0-2.49-5.81A7.94 7.94 0 0 0 94 19.78v-.27A7.94 7.94 0 0 0 99.79 17a8 8 0 0 0 2.49-5.8h.27A8 8 0 0 0 105 17a8 8 0 0 0 5.81 2.49v.27a8 8 0 0 0-5.81 2.51 7.94 7.94 0 0 0-2.49 5.81Zm-41.5 8h-.41a12.06 12.06 0 0 0-3.78-8.82A12.06 12.06 0 0 0 48 23.5v-.41a12.07 12.07 0 0 0 8.82-3.78 12.09 12.09 0 0 0 3.78-8.82h.41a12.08 12.08 0 0 0 3.77 8.82 12.09 12.09 0 0 0 8.83 3.78v.41a12.09 12.09 0 0 0-8.83 3.78 12.08 12.08 0 0 0-3.77 8.82Z"/></svg></span>
        <span v-else><svg xmlns="http://www.w3.org/2000/svg" class="ionicon biggify" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48m0 320v48m147.08-355.08-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48m-320 0H48m355.08 147.08-33.94-33.94M142.86 142.86l-33.94-33.94"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg></span>
        <div
          class="switch-toggle"
          :class="{ 'switch-toggle-checked': userTheme === 'dark-theme' }"
        ></div>
      </label>
    </div>
  </template>
  
  <script>
  export default {
    mounted() {
      const initUserTheme = this.getTheme() || this.getMediaPreference();
      this.setTheme(initUserTheme);
    },
  
    data() {
      return {
        userTheme: "light-theme",
      };
    },
  
    methods: {
      toggleTheme() {
        const activeTheme = localStorage.getItem("user-theme");
        if (activeTheme === "light-theme") {
          this.setTheme("dark-theme");
        } else {
          this.setTheme("light-theme");
        }
      },
  
      getTheme() {
        return localStorage.getItem("user-theme");
      },
  
      setTheme(theme) {
        localStorage.setItem("user-theme", theme);
        this.userTheme = theme;
        document.documentElement.className = theme;
      },
  
      getMediaPreference() {
        const hasDarkPreference = window.matchMedia(
          "(prefers-color-scheme: dark)"
        ).matches;
        if (hasDarkPreference) {
          return "dark-theme";
        } else {
          return "light-theme";
        }
      },
    },
  };
  </script>
  