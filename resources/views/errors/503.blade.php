
<style>
    /* Reset default margin and padding */
    body, html {
        margin: 0;
        padding: 0;
    }

    /* Ensure full viewport coverage */
    .maintenance-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden; /* Hide overflowing content */
    }

    .maintenance-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover; /* Scale image while maintaining aspect ratio */
    }
</style>

<div class="maintenance-container">
    <img src="admin/images/503.gif" alt="Maintenance Image">
</div>
