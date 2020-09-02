<template>

        <table class="table is-fullwidth">
            <tbody>
                <tr>
                    <td v-if="label != ''" colspan="100%" class="has-text-centered">
                        {{label}}
                    </td>
                </tr>
                <tr v-for="(row, rowIndex) in rows">
                    <td v-for="(column, colIndex) in columns">
                        <input type="number" name="" id="" class="input" required v-model="answer[rowIndex][colIndex]" @input="handleInput">
                    </td>
                    <div v-for=""></div>
                </tr>
            </tbody>
        </table>

</template>

<script>
export default {
    name: 'Matrix',
    props: {
        rows : {
            type: Number,
            required: true
        },
        columns: {
            type: Number,
            required: true
        },
        label: {
            type: String,
            required: false,
            default: ""
        },
        clear: {
            type: Boolean,
            required: true,
            default: false,
        }
    },
    data:  function() {
        return {
            answer: [],

        }



    },

    watch: {
        rows: {
             handler: function() {

                let array_size = [];

                for (let index = 0; index < this.rows; index++) {
                    array_size.push([]);
                }

                this.answer = array_size;

            },

            immediate: true
        },

    },
    methods: {
        handleInput: function() {
            this.$emit('input', this.answer);
        },
    }

}
</script>

<style>

</style>
