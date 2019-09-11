<template>
	<board v-on:changeAdd="add ? addFalse($event) : addTrue()" v-bind:booleanAdd="this.add" v-on:showFormEdit="showFormEditUpdate()" v-bind:showFormUpdate="showFormUpdate"></board>
</template>
<script>
	import board from './BoardComponent.vue';

	export default{
		components: {
			'board' : board,
		},
		data(){
			return{
				add : false,
				token : window.app.csrfToken,
				showFormUpdate : false,
			}
		},
		methods:{
			addTrue(){
				this.add = true;
			},
			addFalse(boolean){
				this.add = boolean;
			},
			showFormEditUpdate(id){
				this.showFormUpdate = true;
			},
		},
	}
</script>
