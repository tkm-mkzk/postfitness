import './bootstrap'
import Vue from 'vue'
import BlogLike from './components/BlogLike'
import BlogTagsInput from './components/BlogTagsInput'
import FollowButton from './components/FollowButton'

const app = new Vue({
  el: '#app',
  components: {
    BlogLike,
    BlogTagsInput,
    FollowButton,
  }
})
