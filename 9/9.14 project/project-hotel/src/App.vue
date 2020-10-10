<template>
  <div id="app">
    <!-- <transition name="slide"> -->
      <router-view></router-view>
    <!-- </transition> -->
  </div>
</template>

<style>

#app {
  width: 100%;
  height: 100%;
}

.slide-enter-active, .slide-leave-active {
  transition: transform .5s;
}
.slide-enter, .slide-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: translateX(-100%);
}

/* 苹方粗体 */
@font-face {
    font-family: "PingFang SC Bold";
    src: url('./assets/font/PINGFANG BOLD.TTF');
}

/* sanfrancisco粗体 */
@font-face {
    font-family: "SanFrancisco Display Bold";
    src: url(./assets/font/SANFRANCISCODISPLAY-BOLD-4.TTF);
}
/* sanfrancisco light */
@font-face {
    font-family: "SanFrancisco Display Light";
    src: url(./assets/font/SANFRANCISCODISPLAY-LIGHT-6.TTF);
}

img {
    vertical-align: middle;
}

.float-left {
  float: left;
}
.float-right {
  float: right;
}

.clear-fix::before,
.clear-fix::after {
  content: "";
  display: table;
  clear: both;
}

.theme {
    color: #eb666b !important;
}
</style>