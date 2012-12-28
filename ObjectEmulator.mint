import time into t
import type into types

/**
 *  /--------------------------\
 *  |  MVC Framework Emulator  |
 *  |  Property of CrowdForce  |
 *  |  @author Oliver Chu      |
 *  \--------------------------/
 * ===> NOT PSUEDOCODE <===
 * YES THIS IS A REAL PROGRAMMING LANGUAGE!
 * STOP ASKING ME THIS QUESTION!
 */
sub evaluateTime(created)
    when created.lower() == "now"
        created = t.date()
    return created
end

// Object Constructor: User
sub User(id, email, name, created)
    created = evaluateTime(created)
    return this
end

// Object Constructor: Follow
sub Follow(id, user_id, follower_id, created)
    // NOTE: null is a keyword, like JavaScript undefined or Python None.
    inherit User(id, null, null, created)
    // This is a bit sloppy, but I'd prefer not to
    // copy code. These objects are all the same.
    erase email
    erase name
    return this
end

// Object Constructor: Bounty
sub Bounty(id, user_id, title, description, due_date, amount, created)
    inherit Follow(id, user_id, null, created)
    erase follower_id
    if amount < 0
        print "WARNING: I think something is wrong here."
        amount = 0
    end
    if description.length() > TOO_LONG_YOUR_NUMBER_HERE
        print "Your description exceeds the maximum number of characters."
        description = description.slice(0, TOO_LONG_YOUR_NUMBER_HERE)
    end
    when t.today() > due_date
        print "WARNING: Due date is past due: " + types.string(due_date)
    return this
end

// I am getting very tired of this repetition.
sub Recommendation(id, user_id, bounty_id, created)
    inherit Follow(id, user_id, null, created)
    erase follower_id
    return this
end

// There is no need to use inheritance for TagWords,
// since apparently tags are not created. They just exist.
sub TagWord(id, word, frequency, shown, used)
    return this
end

heap = []

// I REALLY WISH JAVA COULD JUST DO THIS.
sub reference(obj)
    heap.add(obj)
    return heap.length() - 1
end

// Let the Mint garbage collector
// do its work.
sub deref(address, destroy)
    saved =  heap[address]
    when destroy
        heap[address] = null
    return saved
end

// That's all folks!

