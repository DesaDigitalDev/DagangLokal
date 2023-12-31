<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <p class="h1 mb-2 text-center">Sign Up</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- role_id -->
        <div class="text-center">
            <div class="radio-tile-group">
                <div class="input-container">
                    <input class="radio-button" type="radio" value="2" name="role_id" id="Seller"
                        autocomplete="off" />
                    <div class="radio-tile">
                        <div class="icon walk-icon">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path
                                        d="M410 4918 l0 -202 -206 -494 -206 -494 4 -171 c3 -165 4 -174 31
-229 33 -68 109 -139 172 -164 l45 -17 0 -1573 0 -1574 2014 0 2015 0 11 58
c34 164 22 145 103 178 l72 30 89 -59 89 -59 164 165 165 164 -59 89 -59 89
30 72 30 72 55 12 c31 6 77 15 103 21 l48 10 0 233 0 233 -95 18 c-52 10 -99
20 -104 24 -6 3 -23 37 -39 75 l-30 69 58 86 58 87 -161 161 c-89 89 -166 162
-170 162 -4 0 -45 -25 -90 -55 l-83 -56 -55 24 c-30 14 -61 27 -71 30 -11 4
-20 26 -28 64 -7 32 -16 79 -22 106 l-10 47 -199 0 -199 0 0 498 0 498 48 22
c75 34 127 85 164 160 33 66 33 68 36 232 l4 166 -206 494 -206 494 0 203 0
203 -1655 0 -1655 0 0 -202z m3140 -48 l0 -80 -1485 0 -1485 0 0 80 0 80 1485
0 1485 0 0 -80z m-2762 -262 c-3 -7 -65 -192 -137 -410 l-133 -398 -155 0
c-120 0 -154 3 -150 13 2 6 73 176 157 377 84 201 158 380 165 398 l14 32 122
0 c93 0 120 -3 117 -12z m422 2 c0 -9 -158 -649 -191 -772 l-10 -38 -159 0
-158 0 136 410 137 410 122 0 c77 0 123 -4 123 -10z m350 3 c1 -23 -62 -772
-66 -790 -4 -23 -7 -23 -160 -23 -121 0 -155 3 -152 13 3 6 49 191 104 410
l99 397 87 0 c49 0 88 -3 88 -7z m420 -403 l0 -410 -161 0 -162 0 6 58 c4 31
18 201 32 377 14 176 28 335 31 353 l5 32 124 0 125 0 0 -410z m424 368 c5
-38 66 -752 66 -770 0 -5 -72 -8 -160 -8 l-160 0 0 410 0 410 124 0 125 0 5
-42z m440 -355 c55 -219 101 -404 104 -411 3 -10 -29 -12 -154 -10 l-159 3
-32 380 c-18 209 -32 392 -32 408 l-1 27 88 0 87 0 99 -397z m453 -8 c73 -220
133 -403 133 -408 0 -4 -71 -6 -157 -5 l-158 3 -97 395 c-54 217 -98 401 -98
408 0 10 28 12 122 10 l121 -3 134 -400z m454 -5 c93 -223 169 -406 169 -407
0 -2 -69 -3 -154 -3 l-154 0 -133 398 c-72 218 -134 403 -137 410 -3 10 22 12
118 10 l122 -3 169 -405z m-3253 -682 c-3 -68 -10 -114 -21 -135 -48 -91 -169
-116 -251 -52 -46 36 -56 69 -56 184 l0 105 166 0 167 0 -5 -102z m492 5 c0
-77 -4 -105 -20 -137 -48 -98 -166 -120 -251 -49 -47 40 -59 79 -59 188 l0 95
165 0 165 0 0 -97z m500 15 c0 -105 -14 -154 -54 -194 -79 -79 -213 -59 -260
40 -11 24 -16 62 -16 135 l0 101 165 0 165 0 0 -82z m490 -19 c0 -86 -3 -107
-22 -141 -29 -52 -77 -80 -136 -81 -58 -1 -102 22 -139 70 -26 33 -28 44 -32
145 l-3 108 166 0 166 0 0 -101z m500 9 c0 -69 -5 -104 -19 -134 -45 -99 -160
-129 -249 -65 -48 34 -62 76 -62 190 l0 101 165 0 165 0 0 -92z m490 -9 c0
-114 -14 -156 -62 -190 -89 -64 -204 -34 -249 65 -14 30 -19 65 -19 134 l0 92
165 0 165 0 0 -101z m499 -7 c-4 -101 -6 -112 -32 -145 -37 -48 -81 -71 -139
-70 -59 1 -107 29 -136 81 -19 34 -22 55 -22 141 l0 101 166 0 166 0 -3 -108z
m491 7 c0 -73 -5 -111 -16 -135 -47 -99 -181 -119 -260 -40 -40 40 -54 89 -54
194 l0 82 165 0 165 0 0 -101z m-2050 -2871 l1330 -3 -55 -82 c-30 -45 -55
-86 -55 -90 0 -4 69 -76 152 -160 l153 -153 -1513 0 -1512 0 0 1489 0 1488 44
17 c24 9 61 32 82 50 l39 34 3 -1294 2 -1294 1330 -2z m-724 2511 c40 -20 64
-24 134 -24 96 0 150 19 213 75 l37 32 37 -32 c85 -75 212 -99 315 -61 31 12
76 37 99 55 l43 33 49 -38 c125 -94 296 -90 410 11 l37 32 37 -32 c114 -101
285 -105 410 -11 l49 38 43 -33 c68 -53 144 -77 224 -71 l67 4 0 -606 0 -606
-130 -130 c-71 -71 -130 -134 -130 -140 0 -6 25 -47 55 -93 l55 -82 -21 -51
-22 -50 -29 51 c-36 63 -91 119 -153 156 -27 16 -173 65 -334 114 l-286 86 -3
66 c-3 66 -2 68 43 123 55 68 90 136 110 212 21 80 21 396 0 476 -59 228 -255
380 -487 379 -180 -1 -347 -104 -431 -267 -47 -89 -57 -153 -57 -347 0 -247
16 -309 112 -436 47 -62 48 -64 48 -136 l0 -72 -277 -83 c-153 -46 -298 -94
-323 -106 -65 -34 -120 -85 -158 -148 -55 -91 -62 -135 -62 -394 l0 -233 -85
0 -85 0 0 1159 0 1158 68 -4 c80 -6 156 18 223 72 l43 34 31 -28 c18 -15 54
-39 81 -52z m2491 -5 l43 -17 0 -614 0 -614 -45 -19 -46 -20 -39 26 -40 27 0
659 0 660 42 -36 c22 -20 61 -43 85 -52z m-1476 -306 c65 -30 126 -89 159
-154 24 -48 25 -54 25 -269 0 -219 0 -220 -27 -270 -84 -159 -264 -221 -433
-151 -57 24 -130 100 -160 168 -25 56 -29 76 -33 203 -7 225 17 321 101 405
99 99 242 126 368 68z m1953 -918 c3 -22 11 -62 16 -88 l11 -47 67 -20 c37
-10 102 -36 144 -57 87 -44 78 -45 176 20 l53 35 69 -68 69 -68 -50 -73 -49
-74 39 -78 c22 -43 49 -110 61 -148 l21 -71 72 -13 c40 -7 78 -15 85 -17 8 -4
12 -34 12 -102 l0 -98 -72 -13 c-40 -7 -79 -16 -87 -20 -7 -4 -26 -45 -41 -92
-15 -47 -42 -111 -60 -142 l-32 -57 46 -69 c25 -39 46 -73 46 -77 0 -10 -122
-133 -132 -133 -5 0 -39 21 -77 46 l-69 45 -78 -39 c-44 -22 -106 -48 -139
-58 -33 -10 -65 -24 -71 -31 -6 -7 -17 -47 -24 -88 l-13 -75 -97 0 c-69 0 -99
4 -103 12 -2 7 -10 45 -17 85 l-13 72 -71 21 c-38 12 -105 39 -148 61 l-78 39
-74 -49 -73 -50 -68 69 -69 69 47 70 c26 39 47 74 47 77 0 4 -17 41 -38 83
-21 42 -47 106 -57 143 l-20 67 -47 11 c-26 5 -66 13 -88 16 l-40 7 0 98 c0
112 -12 98 108 122 l64 12 27 86 c15 47 43 113 61 147 l34 61 -47 70 c-26 39
-47 74 -47 78 0 10 122 133 132 133 5 0 40 -21 79 -47 l70 -47 61 34 c34 18
100 46 147 61 l86 27 12 64 c24 120 10 108 122 108 l98 0 7 -40z m-2089 -115
c50 0 107 4 128 9 l37 8 0 -38 c0 -35 -8 -46 -77 -116 -43 -43 -82 -78 -88
-78 -5 0 -45 35 -87 77 -71 70 -78 81 -78 116 l0 39 38 -8 c20 -5 78 -9 127
-9z m-135 -320 l135 -135 136 136 136 135 254 -76 c140 -41 274 -83 298 -92
78 -28 173 -133 139 -154 -7 -5 -23 -9 -35 -9 l-23 0 0 -234 c0 -215 1 -235
18 -239 9 -3 -45 -5 -120 -6 l-138 -1 -2 203 -3 202 -82 3 -83 3 0 -206 0
-205 -495 0 -495 0 0 205 0 205 -85 0 -85 0 0 -205 0 -205 -166 0 -166 0 4
233 c3 196 6 238 21 272 21 47 70 100 112 122 26 14 553 179 580 182 6 1 71
-60 145 -134z m1802 -1282 c32 -13 55 -39 45 -50 -2 -2 -69 -2 -147 -1 l-143
3 69 46 c68 46 69 46 104 32 19 -8 52 -21 72 -30z" />
                                    <path d="M580 415 l0 -85 80 0 80 0 0 85 0 85 -80 0 -80 0 0 -85z" />
                                    <path d="M910 415 l0 -85 80 0 80 0 0 85 0 85 -80 0 -80 0 0 -85z" />
                                    <path d="M1240 415 l0 -85 80 0 80 0 0 85 0 85 -80 0 -80 0 0 -85z" />
                                    <path
                                        d="M3914 1635 c-55 -13 -147 -53 -179 -78 -19 -15 -19 -17 25 -81 25
-36 47 -64 50 -63 60 33 127 58 175 65 217 34 426 -115 466 -333 17 -94 5
-162 -57 -302 -3 -6 23 -32 58 -58 72 -52 70 -53 115 43 39 83 53 149 53 249
0 320 -260 576 -580 572 -41 -1 -98 -7 -126 -14z" />
                                    <path
                                        d="M3546 1358 c-151 -260 -69 -600 187 -768 162 -106 381 -121 559 -37
96 45 95 43 43 115 -26 35 -52 61 -58 58 -140 -62 -208 -74 -302 -57 -268 50
-415 341 -295 586 16 33 28 60 27 61 -1 0 -29 19 -61 42 -33 23 -63 42 -67 42
-5 0 -19 -19 -33 -42z" />
                                </g>
                            </svg>
                        </div>
                        <label for="Seller" class="radio-tile-label">Seller</label>
                    </div>
                </div>

                <div class="input-container">
                    <input class="radio-button" type="radio" value="3" name="role_id" id="produser"
                        autocomplete="off" />
                    <div class="radio-tile">
                        <div class="icon bike-icon">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path
                                        d="M1879 4737 c-69 -29 -107 -55 -149 -104 -34 -39 -90 -147 -90 -174 0
-11 -12 -18 -38 -23 -60 -9 -156 -63 -202 -112 -88 -96 -127 -234 -97 -349
l15 -59 -34 -40 c-42 -49 -73 -131 -81 -212 -7 -71 20 -176 60 -234 23 -33 24
-36 10 -78 -11 -31 -14 -72 -11 -145 5 -125 29 -178 112 -255 54 -49 105 -73
188 -87 32 -6 37 -11 43 -43 3 -21 25 -75 47 -122 32 -68 56 -101 119 -162
l77 -77 -43 -28 c-24 -15 -49 -38 -56 -50 -11 -20 -20 -23 -75 -23 l-62 0 -6
54 c-8 57 -30 90 -73 107 -13 5 -85 9 -159 9 -129 0 -134 1 -134 21 0 27 -18
60 -44 81 -19 16 -56 18 -392 18 -360 0 -372 -1 -397 -21 -15 -11 -32 -38 -38
-60 l-12 -39 -136 0 c-118 0 -140 -3 -169 -20 -18 -11 -37 -32 -42 -46 -15
-38 -13 -2019 1 -2047 6 -12 21 -30 33 -39 19 -16 75 -18 759 -18 l739 0 29
29 c16 16 29 37 29 45 0 14 45 16 424 16 413 0 424 0 450 21 33 26 36 79 6
109 -19 19 -33 20 -444 20 l-425 0 -3 269 c-3 248 -4 271 -22 290 -26 29 -86
29 -112 0 -18 -20 -19 -43 -22 -335 l-3 -314 -650 0 -649 0 0 935 0 935 105 0
105 0 0 -35 c0 -47 22 -98 51 -119 21 -14 67 -16 392 -16 l369 0 34 34 c30 30
34 40 34 85 l0 51 105 0 104 0 3 -474 c3 -450 4 -475 22 -495 26 -29 86 -29
112 0 18 20 19 44 22 410 l3 389 64 0 65 0 0 -231 c0 -139 4 -238 10 -250 16
-29 68 -52 103 -45 17 3 98 61 192 136 89 71 167 130 173 130 8 0 12 -88 14
-276 l3 -276 24 -19 c32 -26 73 -24 99 4 21 23 22 30 22 290 0 224 2 269 14
273 9 3 75 -42 167 -117 83 -67 165 -128 180 -136 39 -20 83 -9 114 29 l25 30
0 229 0 229 135 0 135 0 0 -235 0 -235 -80 0 c-89 0 -128 -14 -148 -52 -9 -17
-13 -158 -15 -553 l-2 -530 -83 -5 c-94 -6 -112 -18 -112 -76 0 -23 8 -39 26
-53 27 -21 29 -21 1163 -21 1118 0 1137 0 1169 20 18 11 37 32 42 46 7 17 9
234 8 595 l-3 569 -28 27 c-25 26 -35 28 -117 31 l-90 4 0 124 c0 111 -2 126
-20 144 -30 30 -83 27 -109 -6 -19 -24 -21 -40 -21 -145 l0 -119 -250 0 -250
0 0 355 0 355 250 0 250 0 0 -79 c0 -64 4 -83 21 -105 26 -33 79 -36 109 -6
18 18 20 33 20 151 l0 131 -29 29 -29 29 -804 0 c-746 0 -805 -2 -824 -18 -35
-28 -44 -56 -44 -141 l0 -81 -134 0 c-132 0 -134 0 -150 25 -9 14 -35 36 -57
50 l-40 26 73 72 c79 78 134 169 163 269 15 54 18 58 53 63 223 36 348 245
287 479 -14 55 -14 59 5 83 36 46 60 129 60 207 0 93 -20 158 -70 230 -39 56
-40 58 -29 102 6 24 9 79 7 122 -10 173 -134 312 -307 347 -51 11 -55 13 -66
51 -31 104 -107 194 -204 242 -51 24 -66 27 -166 27 -102 0 -114 -2 -165 -29
-30 -15 -67 -40 -82 -53 l-27 -26 -40 32 c-70 56 -126 75 -231 78 -82 3 -103
0 -151 -20z m238 -146 c23 -11 56 -34 75 -51 74 -73 136 -72 214 0 25 23 61
48 79 56 45 19 136 18 183 -2 78 -32 141 -120 142 -197 0 -44 22 -92 45 -101
9 -3 44 -6 78 -6 101 -1 185 -54 221 -142 23 -53 20 -140 -4 -188 -31 -60 -26
-86 24 -135 69 -67 89 -114 84 -200 -2 -41 -9 -79 -17 -88 -12 -15 -16 -15
-41 3 -36 26 -104 50 -140 50 -26 0 -28 3 -34 53 -14 108 -80 202 -181 255
l-50 27 -471 3 c-456 3 -473 2 -527 -18 -109 -41 -191 -146 -206 -262 l-6 -51
-55 -11 c-31 -7 -76 -24 -102 -39 l-46 -27 -13 33 c-8 17 -14 59 -13 92 0 72
27 131 79 172 53 42 61 72 36 128 -29 66 -35 108 -21 165 26 109 98 169 217
180 46 5 81 14 90 23 9 9 20 44 25 78 13 97 70 176 148 208 42 17 141 12 187
-8z m650 -822 c40 -15 73 -48 94 -94 17 -36 19 -71 19 -395 0 -386 -6 -438
-57 -531 -29 -54 -110 -138 -163 -171 -74 -44 -139 -59 -290 -65 -87 -3 -179
-1 -230 6 -186 25 -328 140 -381 312 -17 55 -19 96 -19 442 0 378 1 382 23
422 13 22 40 49 62 62 40 23 42 23 477 23 285 0 446 -4 465 -11z m-1177 -538
c0 -116 -3 -212 -8 -214 -15 -10 -86 23 -119 54 -43 43 -56 88 -52 182 4 66 8
80 34 113 34 41 88 74 122 74 l23 0 0 -209z m1526 184 c61 -36 86 -82 92 -170
4 -62 1 -81 -18 -120 -25 -52 -68 -88 -122 -103 l-38 -10 0 214 c0 213 0 214
22 214 12 0 40 -11 64 -25z m-2026 -985 l0 -70 -290 0 -290 0 0 70 0 70 290 0
290 0 0 -70z m2380 -140 l0 -160 29 -32 29 -33 145 -3 c226 -5 237 6 237 243
l0 145 85 0 85 0 0 -355 0 -355 -390 0 -390 0 0 355 0 355 85 0 85 0 0 -160z
m290 40 l0 -120 -70 0 -70 0 0 120 0 120 70 0 70 0 0 -120z m-1752 -186 c6
-12 27 -35 47 -52 19 -17 35 -35 35 -39 -1 -4 -22 -24 -48 -44 -26 -20 -71
-56 -99 -79 l-53 -42 0 211 0 211 48 30 47 29 6 -102 c3 -56 10 -112 17 -123z
m462 144 l0 -77 -77 -65 c-42 -36 -81 -66 -86 -66 -9 0 -144 115 -159 135 -8
10 -11 139 -4 146 2 2 77 4 165 4 l161 0 0 -77z m212 51 l48 -31 0 -210 c0
-200 -1 -209 -18 -196 -10 7 -58 44 -106 83 l-88 70 40 35 c22 19 45 45 51 57
6 12 11 67 11 122 0 56 3 101 7 101 3 0 28 -14 55 -31z m750 -940 l3 -191 33
-29 32 -29 146 0 c159 0 191 8 212 55 8 17 12 88 12 205 l0 180 190 0 190 0 0
-495 0 -495 -595 0 -595 0 0 495 0 495 184 0 185 0 3 -191z m288 46 l0 -145
-70 0 -70 0 0 145 0 145 70 0 70 0 0 -145z m1250 -350 l0 -495 -285 0 -285 0
0 495 0 495 285 0 285 0 0 -495z" />
                                    <path
                                        d="M1950 3523 c-43 -16 -50 -33 -50 -129 0 -83 2 -95 22 -114 46 -43
111 -15 124 55 11 59 0 144 -22 165 -22 21 -53 31 -74 23z" />
                                    <path
                                        d="M2613 3515 c-38 -16 -43 -30 -43 -126 0 -71 3 -83 25 -104 13 -14 36
-25 50 -25 14 0 37 11 50 25 22 22 25 32 25 105 0 45 -4 90 -10 100 -15 28
-61 40 -97 25z" />
                                    <path
                                        d="M2262 3403 c-11 -10 -48 -56 -81 -101 -52 -71 -61 -90 -61 -125 0
-23 6 -53 13 -67 17 -34 144 -130 172 -130 38 0 75 37 75 75 0 28 -9 41 -52
78 l-52 45 52 69 c59 80 66 116 29 151 -28 27 -68 28 -95 5z" />
                                    <path
                                        d="M2062 2887 c-52 -55 -15 -119 98 -175 48 -24 67 -27 150 -27 85 0
101 3 153 29 68 35 117 86 117 122 0 32 -42 74 -74 74 -13 0 -38 -11 -54 -25
-89 -74 -189 -74 -288 1 -39 30 -74 30 -102 1z" />
                                </g>
                            </svg>

                        </div>
                        <label for="produser" class="radio-tile-label">Produsen</label>
                    </div>
                </div>

            </div>

            <!-- Nik -->
            <div class="mt-4">
                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')"
                    required autofocus autocomplete="nik" placeholder="Nik" />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" placeholder="Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="email" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" placeholder="Password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- mobile_number -->
            <div class="mt-4">
                <x-text-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number"
                    :value="old('mobile_number')" required autofocus autocomplete="mobile_number" placeholder="Phone Number" />
                <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
            </div>

            <!-- address -->
            <div class="mt-4">
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                    :value="old('address')" required autofocus autocomplete="address" placeholder="Address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- photos -->
            <div class="mt-4" hidden>
                <x-text-input id="photos" class="block mt-1 w-full" type="text" name="photos"
                    :value="old('photos')" autofocus autocomplete="photos" placeholder="User Roles" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
