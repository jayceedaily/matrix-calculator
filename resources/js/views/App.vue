<template>
    <section class="section">
        <div class="container">


                    <div class="columns">
                        <div class="column">
                            <form @submit.prevent="handleCompute">
                                <div class="columns">
                                    <div class="column">
                                        <div class="card">
                                            <div class="card-content" style="padding-bottom:0">
                                                <div class="columns  is-vcentered">
                                                    <div class="column">
                                                        <p class="is-size-3">Matrix A</p>
                                                    </div>
                                                    <div class="column">
                                                        <div class="field is-grouped  is-pulled-right">
                                                            <div class="control">
                                                                <div class="field">
                                                                    <label for="">Row</label>
                                                                    <div class="control">
                                                                        <div class="select">
                                                                            <select v-model="form.a_row">
                                                                                <option :value="1">1</option>
                                                                                <option :value="2">2</option>
                                                                                <option :value="3">3</option>
                                                                                <option :value="4">4</option>
                                                                                <option :value="5">5</option>
                                                                                <option :value="6">6</option>
                                                                                <option :value="7">7</option>
                                                                                <option :value="8">8</option>
                                                                                <option :value="9">9</option>
                                                                                <option :value="10">10</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control">
                                                                <div class="field">
                                                                    <label for="">Column</label>
                                                                    <div class="control">
                                                                        <div class="select">
                                                                            <select v-model="form.a_column">
                                                                                <option :value="1">1</option>
                                                                                <option :value="2">2</option>
                                                                                <option :value="3">3</option>
                                                                                <option :value="4">4</option>
                                                                                <option :value="5">5</option>
                                                                                <option :value="6">6</option>
                                                                                <option :value="7">7</option>
                                                                                <option :value="8">8</option>
                                                                                <option :value="9">9</option>
                                                                                <option :value="10">10</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="margin-bottom:0">
                                            <matrix :rows="form.a_row" :columns="form.a_column" @input="handleInputA" :clear="a_clear"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column">
                                        <div class="card">
                                            <div class="card-content" style="padding-bottom:0">
                                                <div class="columns  is-vcentered">
                                                    <div class="column">
                                                        <p class="is-size-3">Matrix B</p>
                                                    </div>
                                                    <div class="column">
                                                        <div class="field is-grouped  is-pulled-right">
                                                            <div class="control">
                                                                <div class="field">
                                                                    <label for="">Row</label>
                                                                    <div class="control">
                                                                        <div class="select">
                                                                            <select v-model="form.a_column" disabled>
                                                                                <option :value="1">1</option>
                                                                                <option :value="2">2</option>
                                                                                <option :value="3">3</option>
                                                                                <option :value="4">4</option>
                                                                                <option :value="5">5</option>
                                                                                <option :value="6">6</option>
                                                                                <option :value="7">7</option>
                                                                                <option :value="8">8</option>
                                                                                <option :value="9">9</option>
                                                                                <option :value="10">10</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control">
                                                                <div class="field">
                                                                    <label for="">Column</label>
                                                                    <div class="control">
                                                                        <div class="select">
                                                                            <select v-model="form.b_column">
                                                                                <option :value="1">1</option>
                                                                                <option :value="2">2</option>
                                                                                <option :value="3">3</option>
                                                                                <option :value="4">4</option>
                                                                                <option :value="5">5</option>
                                                                                <option :value="6">6</option>
                                                                                <option :value="7">7</option>
                                                                                <option :value="8">8</option>
                                                                                <option :value="9">9</option>
                                                                                <option :value="10">10</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <matrix :rows="form.a_column" :columns="form.b_column" @input="handleInputB" :clear="b_clear"/>
                                        </div>
                                    </div>
                                </div>

                                <button class="button is-primary" type="submit">Compute</button>
                            </form>
                        </div>
                    </div>

                    <div class="columns" v-if="answer">
                        <div class="column">
                            <div class="card">

                                <table class="table is-fullwidth">
                                    <tbody>
                                        <tr v-for="row in answer">
                                            <td v-for="col in row">{{col}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
    </section>
</template>

<script>
import Matrix from './matrix'
export default {
    name: 'App',
    components: {
        Matrix
    },
    data: function() {
        return {
            answer: false,

            form: {
                a: null,
                a_column: 3,
                a_row: 3,
                b: null,

                b_column: 3,
            },

            a_clear: false,
            b_clear: false,

        }
    },

    methods: {
        handleInputA: function(data) {
            this.form.a = data;
        },
        handleInputB: function(data) {
            this.form.b = data;
        },

        handleCompute: function() {

            this.form.b_row = this.form.a_column;

            axios({ url: 'api/matrix-compute',
                        method: 'POST',
                        data:this.form}).then((response) => {

                            console.log(response);
                            this.answer = response.data;
                        });
        },

    }

}
</script>

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
