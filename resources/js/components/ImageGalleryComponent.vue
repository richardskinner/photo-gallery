<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <ul class="list-unstyled list-inline">
          <li class="list-inline-item" v-for="item in gallery">
            <div class="card">
              <img :src="item.image" class="card-img-top fluid" />
              <div class="card-body">
                <div class="card-title">{{ item.title }}-{{ item.id }}</div>
                <button class="btn btn-danger" @click="removeImage(item.id)">Remove</button>
              </div>
            </div>
          </li>
        </ul>
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
  },
  methods: {
    removeImage(id) {
      if (confirm('Are you sure you want to remove image?')) {
        window.axios.delete('image-gallery/' + id).then(response => response.status === 200 ? location.reload() : null)
      }
    }
  },
}
</script>
