<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-header">Tweet Status</div>

                            <div class="card-body">
                                <span>Please enter Tweet URl to check on the status!</span>
                                <div class="form-group">
                                    <label class="col-form-label">URL</label>
                                    <input type="text" v-model="url" name="url" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" v-on:click="getTweetDetails()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" v-if="tweet.tweet_id">
                <div class="justify-content-center card card-default">
                    <div class="card-header">Tweet:
                        <span>{{tweet['user']['user_screen_name']}}/{{tweet['tweet_id']}}</span></div>

                    <div class="card-body ">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="flex-container">
                                    <div class="flex-item">
                                        <i data-feather="repeat" class="feather retweet"></i>
                                        <label class="col-sm-12">{{twt['retweet_count'] | toFixed}}</label>
                                    </div>
                                    <div class="flex-item">
                                        <i data-feather="heart" class="feather heart"></i>
                                        <label class="col-sm-12">{{tweet['favorite_count']}}</label>
                                    </div>
                                    <div class="flex-item">
                                        <i data-feather="users" class="feather followers"></i>
                                        <label class="col-sm-12">{{tweet['user']['followers_count']}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    window.feather = require('feather-icons');

    export default {
        data: function () {
            return {
                url: 'https://twitter.com/BMWMotorsport/status/978204814243966976',
                twt: {
                    'retweet_count': 0
                },
                tweet: {
                    'retweet_count': 0
                }
            }
        },
        mounted() {
            console.log('Home component mounted.')
        },
        methods: {
            getTweetDetails: function () {
                var that = this;
                if (this.url) {
                    let tweetArr = this.url.split('/');
                    let tweet_id = tweetArr[tweetArr.length - 1];
                    Axios.get('tweets', {
                        params: {
                            id: tweet_id
                        }
                    }).then(function (response) {
                        that.tweet = response.data;
                    }).catch(function (err) {
                        console.error(err);
                    });
                }

            }
        },
        watch: {
            tweet: function (newValue, oldValue) {
                setTimeout(function () {
                    feather.replace();

                }, 1);
                TweenLite.to(this.twt, 2, {retweet_count: newValue.retweet_count});
            }
        },
        filters: {
            toFixed: function(value) {
                return value.toFixed(0);
            }
        }

    }
</script>
