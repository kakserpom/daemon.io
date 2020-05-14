### types # Data types

Most phpdaemon options are described by their data types, allowing you to specify values in an extended format.

#### size # Size
This is used to specify an amount of data. It can be written either as a whole number or as a whole number with a suffix.

Format: `integer [bBkKmMgG]?`

| Suffix | Factor | Example | Value |
|--|--|--|--|
| b, B | 1 | 1b | 1 |
| k | 1000 | 1k | 1000 |
| K | 1024 | 1K | 1024 |
| m | 1000 * 1000 | 1m | 1000000 |
| M | 1024 * 1024 | 1M | 1048576 |
| g | 1000 \* 1000 * 1000 | 1g | 1000000000 |
| G | 1024 \* 1024 * 1024 | 1G | 1073741824 |

#### time # Time
This is used to specify a number of seconds. The number can be floating point using the decimal separator `"."` only.

Format: `float [smhd]?` or `(float [smhd])+`

| Suffix | Factor | Example | Value |
|--|--|--|--|
| s | 1 | 1s | 1 |
| m | 60 | 1m | 60 |
| h | 60 * 60 | 2h 12s | 7212 |
| d | 60 \* 60 * 24 | 1d 15m 32s | 87332 |

#### number # Number
This is used to specify numbers.

Format: `integer [kKmMgG]?`

| Suffix | Factor | Example | Value |
|--|--|--|--|
| k, K | 1000 | 1k | 1000 |
| m, M | 1000 * 1000 | 1M | 1000000 |
| g, G | 1000 \* 1000 * 1000 | 1g | 1000000000 |
