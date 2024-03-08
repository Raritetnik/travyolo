<template>
    <img src="/assets/images/ApplicationLogo.png" width="140" alt="">
    <!-- <svg
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        width="133"
        height="43"
        viewBox="0 0 133 43"
        fill="none"
    >
        <rect width="133" height="43" fill="url(#pattern0)" />
        <defs>
            <pattern
                id="pattern0"
                patternContentUnits="objectBoundingBox"
                width="1"
                height="1"
            >
                <use
                    xlink:href="#image0_250_3876"
                    transform="matrix(0.00274849 0 0 0.0087305 -0.00434802 -0.196078)"
                />
            </pattern>
            <image
                id="image0_250_3876"
                width="367"
                height="137"
                xlink:href="data:image/png;base64,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"
            />
        </defs>
    </svg> -->
</template>
