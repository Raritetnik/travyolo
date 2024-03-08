import { reactive } from 'vue'

export const store = reactive({
  isHeaderExtended: false,
  extendHeader() {
    this.isHeaderExtended = !this.isHeaderExtended;
  }
})