/* Coded by Craig Lewis ST20317192*/

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(show_Position);
} else {
    console.log("Geolocation is not supported by this browser.");
}

// Finds geographic location.
function show_Position(position) {
    console.log("Latitude: " + position.coords.latitude);
    console.log("Longitude: " + position.coords.longitude);
    document.getElementById("user_Location").innerHTML = position.coords.latitude;

    //API key
    const api_Key = "b81aec273adc4925ad1a59471f8b4c26";
    const URL = `https://api.opencagedata.com/geocode/v1/json?q=${position.coords.latitude}+${position.coords.longitude}&key=${api_Key}`;

    //Retrieves API key and displays user location in words.
    fetch(URL)
        .then(response => response.json())
        .then(data => {
            if (data.results.length > 0) {

                //Access index
                const components = data.results[0].components;

                //Geographic Credentials
                const city = components.town || components.city || components.village || components.hamlet || "Unknown town";
                const state = components.state || "Unknown State";
                const country = components.country || "Unknown country";

                //Combined Variables
                const location_combined = `${city}, ${state}, ${country}`;

                //Display Combined String
                document.getElementById("user_Location").innerHTML = location_combined;
            } else {
                document.getElementById("user_Location").innerHTML = "Location unavailable";
            }
        })
        .catch(error => {
            console.error("Error fetching location name: ", error);
            document.getElementById("user_Location").innerHTML = `Location error`;
        });
}

//Error Checking