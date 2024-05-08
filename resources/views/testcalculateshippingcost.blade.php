<form method="POST" action="{{ route('calculate-shipping-cost') }}">
    @csrf
  
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="" readonly>
  
    <label for="location">Location:</label>
    <input type="text" id="location" name="location" value="" readonly>
  
    <button type="submit">Calculate Shipping Cost</button>
  
    <script>
        // Otomatis mengambil alamat, lokasi saat ini
        function getCurrentLocation() {
          if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
              // Gunakan Nominatim API untuk mendapatkan alamat berdasarkan lokasi
              fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${position.coords.latitude}&lon=${position.coords.longitude}`)
             .then(response => response.json())
             .then(data => {
                  if (data && data.display_name) {
                    document.getElementById('address').value = data.display_name;
                    document.getElementById('location').value = JSON.stringify({
                      latitude: position.coords.latitude,
                      longitude: position.coords.longitude
                    });
      
                    // var currentDate = new Date();
                    // var formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
                    // document.getElementById('datetime').value = formattedDate;
                  } else {
                    alert("Alamat tidak ditemukan. Harap masukkan alamat secara manual.");
                  }
                })
             .catch(error => {
                  console.error('Error fetching address:', error);
                  alert("Terjadi kesalahan saat mencari alamat. Coba lagi nanti.");
                });
            });
          } else {
            alert("Geolocation is not supported by this browser.");
          }
        }
      
        getCurrentLocation();
      </script>
  </form>