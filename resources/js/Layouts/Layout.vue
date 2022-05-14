<script setup>
import Nav from "../Shared/Nav";
import TopNavLinks from "../Shared/TopNavLinks";
import Footer from "../Shared/Footer";</script>

<template>
  <div class="max-w-full mx-auto">
    <nav class="sticky top-0 z-50">
      <TopNavLinks/>
      <Nav/>
    </nav>
    <main>
      <slot/>
    </main>
    <Footer/>
  </div>
</template>
