<template>
	<div class="relative inline-block overflow-hidden">
		<input type="file" accept="image/*" class="hidden" ref="file" @change="change">
		<img :src="scr" alt="Profile Picture" class="h-full w-full object-cover text-sm">
		<div class="absolute top-0 h-full w-full bg-black bg-opacity-25 flex items-center justify-center">
			<button type="button" @click="browse()" class="rounded-full focus:outline-none text-white hover:bg-white hover:bg-opacity-25 p-2 transition duration-500 ease-in-out">
				<icon name="camera" class="h-6 w-6" />
			</button>
			<button type="button" v-if="value" @click="remove()" class="rounded-full focus:outline-none text-white hover:bg-white hover:bg-opacity-25 p-2 transition duration-500 ease-in-out">
				<icon name="remove" class="h-6 w-6" />
			</button>
		</div>
	</div>
</template>
<script>
export default {
	props: {
		value: File,
		defaultSrc: String
	},
	data() {
		return {
			scr: this.defaultSrc,
		}
	},
	methods: {
		browse() {
			this.$refs.file.click();
		},
		remove() {
			this.scr = this.defaultSrc;
			this.$emit('input', null);
		},
		change(e) {
			this.$emit('input', e.target.files[0]);
			let reader = new FileReader();
			reader.readAsDataURL(e.target.files[0]);
			reader.onload = (e) => {
				this.scr = e.target.result;
			}
		}
	},
}

</script>
