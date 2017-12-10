/**
 * @file   bitmap.h
 * @brief  bitmap header for imghack
 * @author simpart
 */
#include "igh/com.h"

#ifndef __IMGHACK_BITMAP_H__
#define __IMGHACK_BITMAP_H__

/*** struct ***/
typedef struct ighbmp_winhdr {
    uint16_t type;
} ighbmp_winhdr_t;

typedef struct ighbmp_os2hdr {
    uint16_t type;
} ighbmp_os2hdr_t;

typedef union ighbmp_hdr {
    ighbmp_winhdr_t winhdr;
    ighbmp_os2hdr_t os2hdr;
} ighbmp_hdr_t;

typedef struct ighbmp_inf {
    int test;
    
} ighbmp_inf_t;

typedef struct ighbmp {
    ighbmp_hdr_t hdr;
    ighbmp_inf_t inf;
    
} ighbmp_t;

/*** prototype ***/



#endif 
