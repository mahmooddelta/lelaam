import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

export default function (params) {
    const {filters: defaultFilters, routeResourceName} = params;

    const filters = ref(defaultFilters);

    const isLoading = ref(false);
    const fetchItemsHandler = ref(null);

    function fetchItems() {
        _.delay(() => {
            Inertia.get(route(`${routeResourceName}`), filters.value, {
                preserveState: true,
                preserveScroll: true,
                replace: true,
                onBefore: () => isLoading.value = true,
                onFinish: () => isLoading.value = false,
            });
        }, 300)
    }

    watch(
        filters,
        () => {
            clearTimeout(fetchItemsHandler.value);

            fetchItemsHandler.value = setTimeout(() => {
                fetchItems();
            }, 300);
        },
        {
            deep: true,
        }
    );

    return {
        filters,
        isLoading,
    }
}
