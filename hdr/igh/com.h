/**
 * @file   com.h
 * @brief  common header for imghack
 * @author simpart
 */
#include <stdio.h>
#include <stdint.h>
#include <sys/types.h>

#ifndef __IMGHACK_COM_H__
#define __IMGHACK_COM_H__

/*** define ***/
/**
 * @brief 
 */
#define IGH_OK  0   //! OK return 
#define IGH_NG  -1  //! NG return

/**
 * @brief byteorder type
 */
#define IGH_BYOR_LITED  0x100   //! little endian
#define IGH_BYOR_BIGED  0x101   //! big endian
#define IGH_BYOR IGH_BYOR_LITED

/*** struct ***/

/*** prototype ***/



#endif 
