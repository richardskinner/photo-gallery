<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-3" v-for="item in gallery">
        <div class="card mb-4">
          <img :src="item.image" class="card-img-top fluid" />
          <div class="card-body">
            <div class="card-title">{{ item.title }}-{{ item.id }}</div>
            <button class="btn btn-danger" @click="removeImage(item.id)">Remove</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ImageGalleryComponent',
  data() {
    return {
      gallery: this.$attrs.images.data,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  }
}
</script>
