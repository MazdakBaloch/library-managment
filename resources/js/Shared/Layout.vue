<template>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <SideBar />
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <TopBar />
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- alert -->
                    <div v-if="$page.props.flash.success" class="alert alert-success alert-dismissible fade show" role="alert">
  {{ $page.props.flash.success }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<!-- error -->
<div v-if="$page.props.flash.error" class="alert alert-success alert-dismissible fade show" role="alert">
  {{ $page.props.flash.error }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                    
                    <!-- Page Heading -->
                    <slot />
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <Footer />
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    
    <!-- End of Page Wrapper -->
</template>
<script setup>
import Footer from './Footer.vue';
import TopBar from './TopBar.vue';
import SideBar from './SideBar.vue';
</script>