## Problem outline

You have been given a [set of data points](sold-price-data.txt), with each item taking the following form:

```
X Y P
```

Where:

- `0 <= X < 100`
- `0 <= Y < 100`
- `10000 < P < 10000000`

`X` and `Y` represent the coordinates of a house which has been sold, and `P` is the price in which it was sold. For example, the point "`5 10 100000`" would be interpreted as a house sold for £100,000 at the point `(5, 10)`.

Using this data plot each point on a grid. The points should be filled with a colour representing how expensive a house was in relation to other houses. The choice of colour is up to you, however, you should use a different colour for each of the following groups:

- 0% - 5%
- 5% - 25%
- 25% - 75%
- 75% - 95%
- 95% - 100%

## Proposed solution
The solution consists of a backend API running on PHP7 / Symfony 4 and a front end
 utilises the JS canvas library P5.js. I opted to use Symfony
because it makes serializing collections of objects easy with relatively little setup.

It makes us of a shared 'MaxProvider' object given on instantiation so that
the SoldProperty's can determine their own price band when they are serialized in an attempt 
to avoid having to loop over and process them again when they've all been read from file.

The front end is a super simple use of P5.js to draw squares on a grid based on the provided co-ordinates.
It's incredibly thin, and it would probably take considerably more work to display anything much more 
informative than a kind of heat map with it. It seemed like a nice simple fit for just displaying this though.

#### Assumptions
I put guards in the Repository / file reader such that if it encountered any lines that
were invalid it would just skip the input and still return all of the good items. I
thought that might be better than just dying outright for this scenario.

## Running
I've included a Makefile to get the app up and running. It needs to run first to create the image currently before init target will work. 

```
make run
make init
make test
```

When the docker image is running it will be available at [http://localhost:8888/app.html]

