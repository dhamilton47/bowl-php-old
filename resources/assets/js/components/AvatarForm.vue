<template>
    <div>
        <div class="level">
            <img :src="avatar" class="mr-1" width="50" height="50">

            <h1 v-text="scorer.name"></h1>

                <!-- <small> member since <span v-text="ago"></span></small> -->
                <!-- <small> member since {{ $profileUser->created_at->diffForHumans() }}</small> -->
        </div>

        <!-- <i class="fas fa-user"></i> -->
        <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
            <image-upload name="avatar" class="mr-1" @loaded="onLoad"></image-upload>
        </form>
    </div>
</template>

<script>
    import moment from 'moment';
    import ImageUpload from './ImageUpload.vue';

    export default {
        props: ['scorer'],

        components: { moment, ImageUpload },

        data() {
            return {
                avatar: this.scorer.avatar_path
            };
        },

        computed: {
            ago() {
                return moment(this.scorer.created_at + 'Z').fromNow() + '...';
            },

            canUpdate() {
                return this.authorize(scorer => scorer.id === this.scorer.id)
            }
        },

        methods: {
            onLoad(avatar) {
                this.avatar = avatar.src;

                this.persist(avatar.file);
            },

            persist(avatar) {
                let data= new FormData();

                data.append('avatar', avatar);

                axios.post(`/api/scorers/${this.scorer.name}/avatar`, data)
                    .then(() => flash('Avatar uploaded!'));
            }
        }
    }
</script>
