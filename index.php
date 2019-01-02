<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">

  <title>Vue!</title>
  <meta name="description" content="">
  <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/bulma.css">
    <style scoped>
        .active {
            color:red;
        }

        .fade-enter-active, .fade-leave-active {
            transition: opacity 1s;
        }

        .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
            opacity: 0;
        }

        .component-fade-enter-active, .component-fade-leave-active {
            transition: opacity .3s ease;
        }
        .component-fade-enter, .component-fade-leave-to
            /* .component-fade-leave-active below version 2.1.8 */ {
            opacity: 0;
        }
        
        .contacted {
            text-decoration: line-through;
        }

        .demo-alert-box {
            background: red;
            border: 1px solid black;
        }

        .tab-button {
            padding: 6px 10px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border: 1px solid #ccc;
            cursor: pointer;
            background: #f0f0f0;
            margin-bottom: -1px;
            margin-right: -1px;
        }

        .tab-button:hover {
            background: #e0e0e0;
        }

        .tab-button.active {
            background: #e0e0e0;
        }

        .tab {
            border: 1px solid #ccc;
            padding: 10px;
        }

    </style>
</head>

<body>

	<!-- normal message -->
    <div id="app-1">
        <p>{{ greeting }}</p>
    </div>
    <hr>

    <!-- title hover -->
    <div id="app-2">
        <p v-bind:title="message">This is some text a title attribute</p>
    </div>
    <hr>

    <!-- reversed message -->
    <div id="app-3">
        <p>{{ message }}</p>
        <button v-on:click="reverseMessage">Click this</button>
    </div>
    <hr>

    <!-- input element -->
    <div id="app-4">
        <p>{{ message }}</p>
        <input type="text" v-model="message" />
    </div>
    <hr>

    <!-- raw HTML -->
    <div id="app-5">
        <p>This is raw HTML {{ rawHTML }}</p>
        <p v-html="rawHTML"></p>
    </div>
    <hr>

    <!-- if -->
    <div id="app-6">
        <p v-if="seen">This can be seen</p>
    </div>
    <hr>

    <!-- for (loop through an array -->
    <!--<div id="app-7">
        <ol>
            <li v-for="car in cars">{{ car.make }}</li>
        </ol>
    </div>
    <hr>
    -->

    <div id="app-8">
        <ol>
            <!--
              Now we provide each car-item with the car object
              it's representing, so that its content can be dynamic.
              We also need to provide each component with a "key",
              which will be explained later.
            -->
            <motor-item
                v-for="car in cars"
                v-bind:motor="car"
                v-bind:key="car.id"
            >
            </motor-item>

        </ol>
    </div>
    <hr>

    <div id="app-9">
        <button v-bind:disabled="isButtonDisabled">Button</button>
    </div>
    <hr>

<!--    <div id="app-10">
        <p v-bind:title="message()">Test this</p>
    </div>
    <hr>
    -->

<!--    <div id="app-10">
        <p :title="title()">Test this</p>
    </div>
    <hr>
    -->

    <div id="app-11">
        <div v-bind:class="{ active: isActive }">{{ message }}</div>
    </div>
    <hr>

    <div id="components-demo">
        <button-counter></button-counter>
    </div>
    <hr>

    <div id="blog-post-demo">
        <blog-post
            v-for="post in posts"
            v-bind:key="post.id"
            v-bind:post="post"
        ></blog-post>
    </div>
    <hr>

    <div id="demo">
        <button v-on:click="show = !show">
            Toggle
        </button>
        <transition name="fade">
            <p v-if="show">hello</p>
        </transition>
    </div>
    <hr>

    <div id="transition-components-demo">
       <!-- <input type="radio" name="option" value="A"> A
        <input type="radio" name="option" value="B"> B<br>-->
        <transition name="component-fade" mode="out-in">
            <component v-bind:is="view"></component>
        </transition>
    </div>
    <hr>

    <div id="staggered-list-demo">
        <input v-model="query">
        <transition-group
                name="staggered-fade"
                tag="ul"
                v-bind:css="false"
                v-on:before-enter="beforeEnter"
                v-on:enter="enter"
                v-on:leave="leave"
        >
            <li
                    v-for="(item, index) in computedList"
                    v-bind:key="item.msg"
                    v-bind:data-index="index"
            >{{ item.msg }}</li>
        </transition-group>
    </div>
    <hr>

    <div id="app-12">
        <button v-on:click="greet('hello')">Click this</button>
        <br>
        <input type="text" v-on:keyup="keyPressed" v-on:keyup.enter="enterHit" />
        <br>
        <h3>{{ fullName }}</h3>
        <label>First Name</label>
        <input type="text" v-model="user.firstName" />
        <br>
        <label>Last Name</label>
        <input type="text" v-model="user.lastName" />
        <br>
        <h3>{{ msg }}</h3>
    </div>
    <hr>

    <div id="app-13">
        <form v-on:submit="addUser">
            <label>Name</label>
            <input type="text" v-model="newUser.name" />
            <br>
            <input type="submit" value="Submit" />
        </form>

        <ul>
            <li v-for="user in users">
                <input type="checkbox" v-model="user.contacted" />
                <span :class="{ contacted: user.contacted }"> {{ user.name }} <button v-on:click="deleteUser(user)">x</button> </span>
            </li>
        </ul>
    </div>
    <hr>

    <div id="app-14">
        <input type="checkbox" id="checkbox" v-model="checked" />
        <label>{{ checked }}</label>
    </div>
    <hr>

    <div id="app-15">
        <!--<input v-model="searchText">
        <p>{{ searchText }}</p>-->

        <input
            v-bind:value="searchText"
            v-on:input="searchText = $event.target.value"
        >
        <p>{{ searchText }}</p>
    </div>
    <hr>

    <div id="app-16">
        <custom-input v-model="searchText"></custom-input>
    </div>
    <hr>

    <div id="app-17">
        <alert-box>An error occurred!</alert-box>
    </div>
    <hr>

    <div id="dynamic-component-demo" class="demo">
        <button
            v-for="tab in tabs"
            v-bind:key="tab"
            v-bind:class="['tab-button', { active: currentTab === tab }]"
            v-on:click="currentTab = tab"
        >{{ tab }}</button>

        <component
            v-bind:is="currentTabComponent"
            class="tab"
        ></component>
    </div>
    <hr>

    <div id="component-example">
        <simple-component-example main-text="Hello there!"></simple-component-example>
    </div>
    <hr>

    <div id="slotsExample">
        <modal>
            <template slot="header">This is the header!</template>
            This is the main text!
            <template slot="footer">
                <button class="button is-success">Save changes</button>
                <button class="button">Cancel</button>
            </template>
        </modal>
    </div>

   <!-- <div id="root">
        <task-list>

        </task-list>
    </div>-->

    <div id="messagesComponent" class="container">
        <message-example title="The first message" body="First message text"></message-example>
        <message-example title="The second message" body="Second message text"></message-example>
    </div>

    <div id="modalComponent">
        <modal-toggle v-if="showModal" @close="showModal = false">
            <p>We insert text here.</p>
        </modal-toggle>
        <button @click="showModal = true">Show modal</button>
    </div>

    <div id="progress-view-component">
        <progress-view inline-template>
            <div>
                <p>Your completion rate is {{ completionRate }}%</p>
                <button @click="completionRate+=10">Update Completion Rate</button>
            </div>
        </progress-view>
    </div>

	<!-- development version, includes helpful console warnings -->
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!--
    Velocity works very much like jQuery.animate and is
    a great option for JavaScript animations
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>

    <script>

        Vue.component('progress-view', {
            data() {
                return {
                    completionRate: 0
                }
            }
        });

        new Vue({
            el: '#progress-view-component'
        });

        Vue.component('modal-toggle', {
            template: `
            <div class="modal is-active">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="box">
                        <slot>This text will be overidden if there is text in the HTML modal-toggle tags.</slot>
                    </div>
                </div>
            <button class="modal-close is-large" aria-label="close" @click="$emit('close')"></button>
            </div>
            `
        });

        new Vue({
            el: '#modalComponent',
            data: {
                showModal: false
            }
        });

        Vue.component('message-example', {
            props: ['title', 'body'],
            data() {
                return {
                    isVisible: true
                };
            },
            template: `
                <article class="message" v-show="isVisible">
                    <div class="message-header">
                        {{ title }}
                        <button class="delete" aria-label="delete" @click="isVisible = false"></button>
                    </div>
                    <div class="message-body">{{ body }}</div>
                </article>
            `/*,
            methods: {
                hideModal() {
                    this.isVisible = false;
                }
            }*/
        });

        new Vue({ el: '#messagesComponent' });

        /*Vue.component('task-list', {
            template: `
                <div>
                    <task v-for="task in tasks">{{ task.description }}</task>
                </div>
            `,
            data() {
                return {
                    tasks: [
                        { description: 'Go to park', complete: false },
                        { description: 'Go to work', complete: false },
                        { description: 'Go to shops', complete: true }
                    ]
                }
            }
        });

        Vue.component('task', {
            template: '<li><slot></slot></li>'
        });

        new Vue({ el: '#root' });*/

        Vue.component('modal', {
            template: `
                <div class="modal">
                    <div class="modal-background"></div>

                    <div class="modal-card">

                        <header class="modal-card-head">
                            <p class="modal-card-title">
                                <slot name="header"></slot>
                            </p>
                            <button class="delete" aria-label="close"></button>
                        </header>

                        <section class="modal-card-body">
                            <slot></slot>
                        </section>

                        <footer class="modal-card-foot">
                            <slot name="footer"></slot>
                        </footer>

                    </div>
                </div>`
        });

        new Vue({
            el: '#slotsExample'
        });

        Vue.component('simple-component-example', {
            props: ['mainText'],
            template: '<p>{{ mainText }}</p>'
        });

        new Vue({
            el: '#component-example'
        });

        const pages = [
            'home',
            'posts',
            'archive',
            'messages',
            'documents',
            'properties'
        ];

        var arrayLength = pages.length;
        for (var i = 0; i < arrayLength; i++) {
            Vue.component('tab-' + pages[i], {
                template: '<div>' + pages[i] + ' component</div>'
            });
        }

        /*Vue.component('tab-home', {
            template: '<div>Home component</div>'
        });

        Vue.component('tab-posts', {
            template: '<div>Posts component</div>'
        });

        Vue.component('tab-archive', {
            template: '<div>Archive component</div>'
        });*/

        new Vue({
            el: '#dynamic-component-demo',
            data: {
                currentTab: 'Home',
                tabs: [
                    'Home',
                    'Posts',
                    'Archive',
                ]
            },
            computed: {
                currentTabComponent: function () {
                    return 'tab-' + this.currentTab.toLowerCase()
                }
            }
        });

        Vue.component('alert-box', {
            template: `
                <div class="demo-alert-box">
                  <strong>Error!</strong>
                  <slot></slot>
                </div>
            `
        });

        new Vue({
            el: '#app-17'
        });

        Vue.component('custom-input', {
            props: ['value'],
            template: `
                <input
                  v-bind:value="value"
                  v-on:input="$emit('input', $event.target.value)"
                >
            `
        });

        new Vue({
            el: '#app-16',
            data: {
                searchText: ''
            }
        });

        new Vue({
            el: '#app-15',
            data: {
                searchText: 'a'
            }
        });

        new Vue({
            el: '#app-14',
            data: {
                checked: false
            }
        });

        new Vue({
            el: '#app-13',
            data: {
                newUser: {},
                users: [
                    { name: 'Rizwaan Khan', contacted: false },
                    { name: 'Tom Jones', contacted: false },
                    { name: 'Gary Smith', contacted: false },
                ]
            },
            methods: {
                addUser: function(e) {
                    // console.log("abc"); ask why this works here with preventDefault below
                    e.preventDefault();
                    this.users.push({
                        name: this.newUser.name,
                        contacted: false
                    });
                },
                deleteUser: function(user) {
                    this.users.splice(this.users.indexOf(user), 1);
                }
            }
        });

        new Vue({
            el: '#app-12',
            props: {
                msg: {
                    type: String, // seems to work without this
                    default: 'hello there'
                }
            },
            data: {
                user: {
                    firstName: 'Riz',
                    lastName: 'Khan'
                }
            },
            methods: {
                greet: function(greeting) {
                    alert(greeting)
                },
                keyPressed: function(e) {
                    console.log(e.target.value)
                },
                enterHit: function() {
                    alert('enter has been hit!')
                }
            },
            computed: {
                fullName: function() {
                    return this.user.firstName + ' ' + this.user.lastName
                }
            }
        })

        new Vue({
            el: '#staggered-list-demo',
            data: {
                query: '',
                list: [
                    { msg: 'Bruce Lee' },
                    { msg: 'Jackie Chan' },
                    { msg: 'Chuck Norris' },
                    { msg: 'Jet Li' },
                    { msg: 'Kung Fury' }
                ]
            },
            computed: {
                computedList: function () {
                    var vm = this
                    return this.list.filter(function (item) {
                        return item.msg.toLowerCase().indexOf(vm.query.toLowerCase()) !== -1
                    })
                }
            },
            methods: {
                beforeEnter: function (el) {
                    el.style.opacity = 0
                    el.style.height = 0
                },
                enter: function (el, done) {
                    var delay = el.dataset.index * 150
                    setTimeout(function () {
                        Velocity(
                            el,
                            { opacity: 1, height: '1.6em' },
                            { complete: done }
                        )
                    }, delay)
                },
                leave: function (el, done) {
                    var delay = el.dataset.index * 150
                    setTimeout(function () {
                        Velocity(
                            el,
                            { opacity: 0, height: 0 },
                            { complete: done }
                        )
                    }, delay)
                }
            }
        })

        new Vue({
            el: '#transition-components-demo',
            data: {
                view: 'v-a'
            },
            components: {
                'v-a': {
                    template: '<div>Component A</div>'
                },
                'v-b': {
                    template: '<div>Component B</div>'
                }
            }
        })

        new Vue({
            el: '#demo',
            data: {
                show: true
            }
        })

        Vue.component('blog-post', {
            props: ['post'],
            template: `
                <div class="blog-post">
                  <h3>{{ post.title }}</h3>
                  <div v-html="post.content"></div>
                </div>
              `
        })

        new Vue({
            el: '#blog-post-demo',
            data: {
                posts: [
                    { id: 1, title: 'My journey with Vue' },
                    { id: 2, title: 'Blogging with Vue' },
                    { id: 3, title: 'Why Vue is so fun' }
                ]
            }
        })

        // normal message
        new Vue({
            el: '#app-1',
            data: {
                greeting: 'Hello'
            }
        })

        // title hover
        new Vue({
            el: '#app-2',
            data: {
                message: 'The date is ' + new Date().toLocaleString()
            }
        })

        // reversed message
        new Vue({
            el: '#app-3',
            data: {
                message: 'This message will be reversed'
            },
            methods: {
                reverseMessage: function() {
                    this.message = this.message.split('').reverse().join('')
                }
            }
        })

        // input element
        new Vue({
            el: '#app-4',
            data: {
                message: 'Please edit this text'
            }
        })

        // raw HTML
        new Vue({
            el: '#app-5',
            data: {
                rawHTML: '<span style="color:red";>This is red text</span>'
            }
        })

        // if
        new Vue({
            el: '#app-6',
            data: {
                seen: true
            }
        })

        // for (loop through an array
        /*new Vue({
            el: '#app-7',
            data: {
                cars: [
                    {make: 'Honda'},
                    {make: 'Toyota'},
                    {make: 'Ford'},
                ]
            }
        })*/

        // Define a new component called car-item
        Vue.component('motor-item', {
            props: ['motor'],
            template: '<li>{{ motor.make }}</li>'
        })

        new Vue({
            el: '#app-8',
            data: {
                cars: [
                    {id: 0, make: 'Honda'},
                    {id: 1, make: 'Peugeot'},
                    {id: 2, make: 'Seat'},
                ]
            }
        })

        new Vue({
            el: '#app-9',
            data: {
                isButtonDisabled: false
            }
        })

/*        new Vue({
            el: '#app-10',
            methods: {
                message: function() {
                    return 'The time is ' + new Date().toLocaleString()
                }
            }
        })*/



        // Define a new component called button-counter
        Vue.component('button-counter', {
            data: function () {
                return {
                    count: 0
                }
            },
            template: '<button v-on:click="count++">You clicked me {{ count }} times.</button>'
        })

        new Vue({ el: '#components-demo' })



        // a data object
        /*var data = { a: 122 }
        // the object is added to a Vue instance
        var vm = new Vue({
            data: data
        })
        console.log(vm.a)*/

	</script>

</body>
</html>