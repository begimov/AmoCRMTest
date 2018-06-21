<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row">
                            <div class="col"><h4 class="mb-0"><span class="badge badge-primary">Всего: {{ count }}</span></h4></div>
                            <div class="col text-right"><a href="#" class="btn btn-sm btn-success">Обновить</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0" v-if="leads.length">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Hash</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="lead in leads" :key="lead.id">
                                        <td>{{ lead.id }}</td>
                                        <td>{{ lead.hash }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./leadslist.js"></script>
