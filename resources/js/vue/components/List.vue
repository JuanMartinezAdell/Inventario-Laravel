<template>
    <div>
        <h1>Listado Productos Almacen</h1>

        <o-table :loading="isLoading" :data="products.length == 0 ? [] : products">
            <o-table-column field="id" label="ID" numeric v-slot="p">
                {{ p.row.id }}
            </o-table-column>
             <o-table-column field="code" label="Codigo" numeric v-slot="p">
                {{ p.row.code }}
            </o-table-column>
            <o-table-column field="description" label="Descripcion" numeric v-slot="p">
                {{ p.row.description }}
            </o-table-column>
            <o-table-column field="maker" label="Marca" numeric v-slot="p">
                {{ p.row.maker }}
            </o-table-column>
            <o-table-column field="created_at" label="Fecha" numeric v-slot="p">
                {{ p.row.created_at }}
            </o-table-column>
            <o-table-column field="condition" label="Estado" numeric v-slot="p">
                {{ p.row.condition }}
            </o-table-column>
            <o-table-column field="stock" label="Stock" numeric v-slot="p">
                {{ p.row.stock }}
            </o-table-column>
        </o-table>
    </div>
</template>

<script>
export default {

    data() {
        return {
            products: [],
            loading: true
        }
    },

    async mounted() {

        this.$axios.get('/api/product').then((res) => {
            this.products = res.data.data;
            console.log(this.products);
            this.loading = false;
        })

    }
};
</script>
