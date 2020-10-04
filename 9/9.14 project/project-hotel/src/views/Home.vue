<template>
	<div class="">home
		<button>{{count}}</button>
	</div>
</template>

<script>
export default {
	props: {
	},
	data () {
		return {
			// count: this.$store.state.count,
		}
	},
	created () {},
	mounted () {
		this.init();
	},
	watch: {},
	computed: {
		count() {
			return this.$store.state.count;
		}
	},
	methods: {
		init() {
			console.log(this);
		}
	},
	components: {},
}
</script>
<style scoped>
</style>
