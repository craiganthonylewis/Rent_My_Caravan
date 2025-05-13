/* Coded by Craig Lewis ST20317192*/

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(show_Position, error_Message);
} else {
    console.log("Geolocation is not supported by this browser.");
}

// Finds geographic location.
function show_Position(position) {
    console.log("Latitude: " + position.coords.latitude);
    console.log("Longitude: " + position.coords.longitude);
    document.getElementById("user_Location").innerHTML = position.coords.latitude;

    //API key = Security Risk: API Key is exposed, it needs storing.
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

                //Combines Variables
                const location_combined = `${city}, ${state}, ${country}`;

                //Displays Combined String
                document.getElementById("user_Location").innerHTML = location_combined;
            } else {
                document.getElementById("user_Location").innerHTML = "Location unavailable";
            }
        })

        //Display Error
        .catch(error => {
            console.error("Error fetching location name: ", error);
            document.getElementById("user_Location").innerHTML = `Location error`;
        });
}

//error handling
function error_Message(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            document.getElementById("user_Location").innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            document.getElementById("user_Location").innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            document.getElementById("user_Location").innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            document.getElementById("user_Location").innerHTML = "An unknown error occurred."
            break;
    }
}