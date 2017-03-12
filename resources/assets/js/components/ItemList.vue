<template>
    <div>
        <li>
            <div class="panel-block"  :class="{bold: isFolder}" @click="toggle">
             <span class="is-success">
                <span v-if="isFolder" class="panel-icon">
                    <i class="fa fa-book"></i>
                </span>
                    {{model.name}} ( {{model.id}} )
                <span v-if="isFolder" class="panel-icon">
                    [{{open ? '-' : '+'}}]
                </span>
            </span>
            </div>
            <ul v-show="open" v-if="isFolder">
                <item-list
                        class="item"
                        v-for="model in model.children"
                        :model="model">
                </item-list>
            </ul>
        </li>

    </div>
</template>

<script>

import bus from '../Bus.js';

export default {
    props: {
        model: Object,
        category_id: Number
    },
    data: function () {
        return {
            open: false,
            active: false
        }
    },
    computed: {
        isFolder: function () {
            return this.model.children &&
                    this.model.children.length;
        }
    },
    methods: {
        toggle: function () {
            if (this.isFolder) {
                this.open = !this.open;
            }

            bus.$emit('contact-refresh', this.model.id);
        }
    }
}
</script>


<style>
    .item {
        cursor: pointer;
    }
    .bold {
        font-weight: bold;
    }
    ul {
        padding-left: 1em;
        line-height: 1.5em;
        list-style-type: dot;
    }
</style>