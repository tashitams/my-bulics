<template>
  <inertia-head :title="title ? `${title} - My BuliCS` : 'My BuliCS'">
    <slot />
  </inertia-head>
</template>

<script>
export default {
  props: {
    title: String,
  },
}
</script>
