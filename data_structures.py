def safe_cast(caster, castee):
    try:
        return caster(castee)
    except:
        return castee

def pyin(*args, **kwargs):
    """
    Pauses the program and returns a string that the user types in, if any.
    The empty string is returned upon no input.
    In Python 2, variable = pyin() does the same thing as C++'s cin >> variable;
    """
    raw_input("")

def error(msg):
    """ Shows an error message and stops the program. """
    print "Error: " + str(msg)
    print "Closing program..."
    pyin()
    exit()

def allocate_list(size, filler=0):
    """
    Returns [filler, filler, filler, ... filler]
             \________________________________/
                              |
                          size times
    filler is any Python value.
    """
    return [filler for _ in xrange(size)]

# Pretend that INDEXED_BY_ONE is actually defined here.
# We will worry about this later...
# Remember, it is just a Python object placeholder such that it is not
# equal to None. It is NOT A FUNCTION!!!
original_len = len
def len(iterable):
    """ Returns the length of an iterable. """
    if original_len(iterable) == 0:
        return 0
    if iterable[0] is INDEXED_BY_ONE:
        return original_len(iterable) - 1
    return original_len(iterable)

def compose(f, g):
    """ Returns lambda x: h(x) such that h(x) equals f(g(x)). """
    def h(x):
        return f(g(x))
    return h

def index_from_one(indexedFromZero):
    """
    Given a list, returns that list indexed starting from 1 instead of 0.
    The length of the list is not changed.
    See Also: len
    """
    return [INDEXED_BY_ONE] + indexedFromZero

class TriangularTable:
    """
    A triangular table represents half of a 2-dimensional array.
    In string or text form, a triangular table might look like the following:
               __
             _/ 6|
           _/ 9 8|
         _/ 1 0 1|
       _/ 7 6 5 0|
     _/ 2 9 2 4 3|
    /____________|
    """
    def __init__(self, biggest_tower_size, given_towers=[]):
        self.max_tower_size = biggest_tower_size
        self.make_tower = compose(index_from_one, allocate_list)
        # The number of towers we need is the same
        # as the maximum tower size.
        self.towers = allocate_list(self.max_tower_size, [])
        current = self.max_tower_size
        index = -1
        rest = lambda lst: lst[1:]
        for _ in xrange(self.max_tower_size):
            if len(given_towers) == 0:
                self.towers[index] = self.make_tower(current)
            else:
                self.towers[index] = given_towers[0]
                given_towers = rest(given_towers)
            current -= 1
            index -= 1
        print self.towers

    def __getitem__(self, tup):
        if len(tup) != 2 or type(tup) is not tuple:
            return #None (is implied)
        try:
            tower = tup[0];
            depth = tup[1];
            if tower == depth:
                return 0
            return self.towers[tower][depth]
        except IndexError:
            # Implied return None.
            pass

    def __setitem__(self, tup, value):
        if len(tup) != 2 or type(tup) is not tuple:
            return
        try:
            tower = tup[0];
            depth = tup[1];
            self.towers[tower][depth] = value;
        except IndexError:
            pass

class ConciseTriangularTable(TriangularTable):
    """
    Offers unordered tuple storage
    for triangular tables.
    """
    def __getitem__(self, tup):
        if len(tup) != 2 or type(tup) is not tuple:
            return #None (is implied)
        try:
            tower = tup[0];
            depth = tup[1];
            if tower == depth:
                return 0
            tower, depth = min(tower, depth), max(tower, depth)
            return self.towers[tower][depth]
        except IndexError:
            # Implied return None.
            pass

    def __setitem__(self, tup, value):
        if len(tup) != 2 or type(tup) is not tuple:
            return
        try:
            tower = tup[0];
            depth = tup[1];
            tower, depth = min(tower, depth), max(tower, depth)
            self.towers[tower][depth] = value;
        except IndexError:
            pass

from math import sin
from math import cos
from math import asin
from math import sqrt

# WRITE MORE FUNCTIONS HERE!
# THIS FILE IS NOT YET FINISHED
# [ TODO ]

