#!/usr/bin/python

# Start by importing the libraries we want to use

import RPi.GPIO as GPIO # This is the GPIO library we need to use the GPIO pins on the Raspberry Pi
import time # This is the time library, we need this so we can use the sleep function

# Define some variables to be used later on in our script


# This is our callback function, this function will be called every time there is a change on the specified GPIO channel, in this example we are using 17

def callback(sensor):  
		print "Dry"
		time.sleep(4)
		GPIO.output(pump, GPIO.HIGH)
		print "Pump On"
		time.sleep(5)
		print "Pump will be turned off"
		GPIO.output(pump, GPIO.Low)
		print "Pump turned off"

# Set our GPIO numbering to BCM
GPIO.setmode(GPIO.BCM)

# Define the GPIO pin that we have our digital output from our sensor connected to
sensor = 17
pump = 22

# Set the GPIO pin to an input
GPIO.setup(sensor, GPIO.IN)
GPIO.setup(pump, GPIO.OUT)

# This line tells our script to keep an eye on our gpio pin and let us know when the pin goes HIGH or LOW
GPIO.add_event_detect(sensor, GPIO.RISING, bouncetime=300)
# This line asigns a function to the GPIO pin so that when the above line tells us there is a change on the pin, run this function
GPIO.add_event_callback(sensor, callback)

# This is an infinte loop to keep our script running
while True:
	# This line simply tells our script to wait 0.1 of a second, this is so the script doesnt hog all of the CPU
	time.sleep(0.1)



#Base SQLite : http://apprendre-python.com/page-database-data-base-donnees-query-sql-mysql-postgre-sqlite

