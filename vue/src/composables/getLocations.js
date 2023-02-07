import { ref } from '@vue/reactivity';
import axios from 'axios';
const getLocations = () => {
    let locations = ref([]);


    const getData = async() => {

        await axios.get('http://127.0.0.1:8000/api/locations').then((response) => {
            locations = response.data.locations;
            console.log('hi'.locations);

        })


    }


    return { locations, getData }
}

export default getLocations;