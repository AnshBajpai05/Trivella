function bookHotel(hotelName, pricePerNight, checkinId, checkoutId) {
    const checkinDate = document.getElementById(checkinId).value;
    const checkoutDate = document.getElementById(checkoutId).value;

    if (checkinDate && checkoutDate) {
        const checkin = new Date(checkinDate);
        const checkout = new Date(checkoutDate);
        const timeDifference = checkout - checkin;
        const days = timeDifference / (1000 * 3600 * 24);

        if (days > 0) {
            const totalCost = days * pricePerNight;
            alert(`Hotel: ${hotelName}\nCheck-in: ${checkinDate}\nCheck-out: ${checkoutDate}\nTotal Nights: ${days}\nTotal Cost: $${totalCost}`);
        } else {
            alert('Check-out date must be after check-in date.');
        }
    } else {
        alert('Please select both check-in and check-out dates.');
    }
}
