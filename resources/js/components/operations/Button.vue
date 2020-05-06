<template>
	<a :href="url" class="text-3 float-right"><i class="fa fa-chevron-left"></i> Retomar operación</a>
</template>

<script>
	import {mapState} from 'vuex'
	export default{
		data(){
			return {
				url: null
			}
		},
		mounted(){
			if (this.page == 1) {
				this.url = '/transferencia-interbancaria'
			}

			if (this.page == 2) {
				this.url = '/pago-interbancario'
			}
		},
		computed: {
			...mapState('common', ['page']),
		}
	}
</script>