import Vue from 'vue'
import Card from './Card.vue'
import Iocn from './Icon.vue'
import Search from './Search'
import Child from './Child.vue'
import Button from './Button.vue'
import Radiobtn from './Radiobtn.vue'
import Checkbox from './Checkbox.vue'
import Dropdown from './Dropdown.vue'
import Pagination from './Pagination'
import Breadcrumbs from './Breadcrumbs'
import TableLoading from './TableLoading'
import { HasError, AlertError, AlertSuccess } from 'vform/components/bootstrap5'

// Components that are registered globaly.
[
  Card,
  Iocn,
  Search,
  Child,
  Button,
  Radiobtn,
  Checkbox,
  Dropdown,
  Pagination,
  Breadcrumbs,
  TableLoading,
  HasError,
  AlertError,
  AlertSuccess
].forEach(Component => {
  Vue.component(Component.name, Component)
})
