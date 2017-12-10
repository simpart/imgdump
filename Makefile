TARGET_EXEC ?= libimghack.so
 
BUILD_DIR ?= ./bin
SRC_DIRS ?= ./src

CC   := gcc 
SRCS := $(shell find $(SRC_DIRS) -name *.c)
OBJS := $(SRCS:%=$(BUILD_DIR)/%.o)
DEPS := $(OBJS:.o=.d)

DEF_BTODR := $(addprefix -D,IGH_BYOR=IGH_BYOR_LITED)
INC_DIRS := ./hdr
INC_FLAGS := $(addprefix -I,$(INC_DIRS))
 
CFLAGS ?= $(INC_FLAGS) $(DEF_BTODR) -O3 -Wall -Wextra -MMD -MP -shared -fPIC
 
$(BUILD_DIR)/$(TARGET_EXEC): $(OBJS)
	$(CC) $(CFLAGS) $(OBJS) -o $@ 
 
# c source
$(BUILD_DIR)/%.c.o: %.c
	$(MKDIR_P) $(dir $@)
	$(CC) $(CFLAGS) -c $< -o $@
 
.PHONY: clean
 
clean:
	$(RM) -r $(BUILD_DIR)
 
install:
	cp ./bin/$(TARGET_EXEC) /usr/lib

-include $(DEPS)
 
MKDIR_P ?= mkdir -p
