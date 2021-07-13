<template>
  <div class="wrapper">
    <Navbar />
    <main>
      <Nuxt />
    </main>
    <Footer />
  </div>
</template>

<script>
</script>

<style >
@import "https://fonts.googleapis.com/css?family=Montserrat|Comfortaa:wght@400;500&display=swap";

:root {
  --main-color: #04a49c;
}

* {
  margin: 0;
  padding: 0;
  list-style: none;
  outline: none;
  box-sizing: border-box;
}

body,
html {
  background: #16151a;
  font-size: 16px;
  height: 100%;
}

label,
textarea,
input,
g,
em,
button,
p,
a,
span,
small {
  font-family: "Comfortaa", "Montserrat", sans-serif;
  font-weight: normal;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Montserrat", sans-serif;
  font-weight: bold;
}

a {
  font-family: "Comfortaa", "Montserrat", sans-serif;
  font-weight: normal;
  color: #fff;
  text-decoration: none;
}

.wrapper {
  display: table;
  height: 100%;
  width: 100%;
}
main {
  display: table-row;
  height: 100%;
}

.container {
  max-width: 1280px;
  padding-left: 15px;
  padding-right: 15px;
  margin: 0 auto;
}

#__layout, #__nuxt{
  height: 100%;
}

.collections {
  margin-top: 85px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}

::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-button {
  background: #333;
}
::-webkit-scrollbar-thumb {
  background-color: #6d6d6d;
  border-radius: 5px;
}
::-webkit-scrollbar-thumb:hover {
  background-color: #04a49c;
}
::-webkit-scrollbar-track {
  background: #333;
}
::-moz-selection {
  background: #04a49c;
  color: #e7ebee;
}
::selection {
  background: #04a49c;
  color: #e7ebee;
}
</style>